<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\MomoSetting;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\PaypalSetting;
use App\Models\Product;
use App\Models\ProductAccountStore;
use App\Models\Transaction;
use App\Models\VnpaySetting;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Mail\OrderSuccessFully;
use Illuminate\Support\Facades\Mail;
use Srmklive\PayPal\Facades\PayPal;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PaymentController extends Controller
{
    //
    public function paymentSuccess()
    {
        return view('frontend.pages.payment-success');
    }
    // ? Store order
    public function storeOrder($paymentMethod, $paymentStatus, $transactionId, $paidAmount, $paidCurrencyName)
    {
        $order = new Order();
        $order->invoice_id = rand(1, 99999) . time() . rand(1, 99999);
        $order->customer_name = session('checkout')['username'];
        $order->customer_email = session('checkout')['email'];
        $order->customer_phone = session('checkout')['phone'];
        if (auth()->check()) {
            $order->user_id = auth()->id();
        }
        $order->sub_total = Cart::priceTotal();
        $order->discount_amount = getDiscountCartTotal();
        $order->total_amount = getMainCartTotal();
        $order->currency_name = 'USD';
        $order->product_quantity = Cart::content()->count();
        $order->payment_method = $paymentMethod;
        $order->payment_status = $paymentStatus;
        $order->order_status = 1;
        $order->coupon = json_encode(Session::get('coupon')) ?? NULL;
        $order->save();
        // store order products

        foreach (Cart::content() as $product) {
            $orderProduct = new OrderProduct();
            $orderProduct->order_id = $order->id;
            $orderProduct->product_id = $product->id;
            $orderProduct->product_name = $product->name;
            $orderProduct->product_price = $product->price;
            $orderProduct->quantity = $product->qty;
            $orderProduct->save();

        }

        // Store transaction details
        $payPalSetting = PaypalSetting::first();
        $transaction = new Transaction();
        $transaction->order_id = $order->id;
        $transaction->transaction_id = $transactionId;
        $transaction->payment_method = $paymentMethod;
        $transaction->amount = getMainCartTotal();
        $transaction->amount_real_currency = $paidAmount;
        $transaction->amount_currency_name = $paidCurrencyName;
        $transaction->save();

    }
    // ? Get account product
    public function getAccountProduct()
    {
        $accountStore = [];
        foreach (Cart::content() as $product) {
            // ? Update product purcharsed and quantity
            $product = Product::where('id', $product->id)->first();
            $product->quantity = $product->quantity - 1;
            $product->purchased = $product->purchased + 1;
            $product->save();

            $productAccountStore = ProductAccountStore::where('product_id', $product->id)->where('used', 0)->first();
            $productAccountStore->used = 1;
            $productAccountStore->used_by_email = session('checkout')['email'];
            $productAccountStore->used_by_user_id = auth()->id() ?? NULL;
            $productAccountStore->order_id = Order::latest()->first()->id;
            // Nếu có code thì lưu code vào mảng accountStore với key là code ngược lại sẽ lưu username và password vào mảng accountStore với key là username và password
            if ($productAccountStore->code) {
                // ? Lưu nhiều code vào mảng accountStore với key là code
                $accountStore['code'][] = $productAccountStore->code;
            } else {
                // ? Lưu nhiều username và password vào mảng accountStore với key là username và password
                $accountStore['username'][] = $productAccountStore->username;
                $accountStore['password'][] = $productAccountStore->password;
            }
            ;
            $productAccountStore->save();
        }
        return $accountStore;
    }
    // ? Send mail
    public function sendMail($accountStore)
    {
        $productAccountStores = $accountStore;
        $username = session('checkout')['username'];
        $email = session('checkout')['email'];
        $phone = session('checkout')['phone'];
        $order = Order::latest()->first();
        Mail::to(session('checkout')['email'])->send(new OrderSuccessFully($productAccountStores, $username, $email, $phone, $order));
    }

    public function increaseCouponUsage()
    {
        if (session()->has('coupon')) {
            $couponCode = session('coupon')['code'];
            $coupon = Coupon::where('code', $couponCode)->first();
            $coupon->total_used = $coupon->total_used + 1;
            $coupon->save();
        }
    }

    public function clearSession()
    {
        Session::forget('checkout');
        Session::forget('coupon');
        Cart::destroy();
    }

    public function paypalConfig()
    {
        $paypalSetting = PaypalSetting::first();
        return [
            'mode' => $paypalSetting->mode === 0 ? 'sandbox' : 'live',
            'sandbox' => [
                'client_id' => $paypalSetting->client_id,
                'client_secret' => $paypalSetting->client_secret,
                'app_id' => 'APP-80W284485P519543T',
            ],
            'live' => [
                'client_id' => $paypalSetting->client_id,
                'client_secret' => $paypalSetting->client_secret,
                'app_id' => '',
            ],

            'payment_action' => 'Sale',
            'currency' => 'USD',
            'notify_url' => '',
            'locale' => 'en_US',
            'validate_ssl' => TRUE,
        ];
    }

    // ***************************************************************************************
    // ***************************************************************************************
    // !! MOMO Payment
    public function execPostRequest($url, $data)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt(
            $ch,
            CURLOPT_HTTPHEADER,
            array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data)
            ),
        );
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        //execute post
        $result = curl_exec($ch);
        //close connection
        curl_close($ch);
        return $result;
    }
    public function payWithMomo()
    {
        $momoSetting = MomoSetting::first();
        $endpoint = "https://test-payment.momo.vn/gw_payment/transactionProcessor";
        $notifyurl = "http://localhost:8000/atm/ipn_momo.php";

        $partnerCode = $momoSetting->partner_code;
        $accessKey = $momoSetting->access_key;
        $serectkey = $momoSetting->secret_key;
        $orderid = time() . "";
        $orderInfo = "Thanh toán qua MoMo";
        $amount = '' . getMainCartTotal() . '';
        $bankCode = 'SML';
        $returnUrl = route('momo.success');
        $requestId = time() . "";
        $requestType = "payWithMoMoATM";
        $extraData = "";
        //before sign HMAC SHA256 signature
        $rawHashArr = array(
            'partnerCode' => $partnerCode,
            'accessKey' => $accessKey,
            'requestId' => $requestId,
            'amount' => $amount,
            'orderId' => $orderid,
            'orderInfo' => $orderInfo,
            'bankCode' => $bankCode,
            'returnUrl' => $returnUrl,
            'notifyUrl' => $notifyurl,
            'extraData' => $extraData,
            'requestType' => $requestType
        );
        // echo $serectkey;die;
        $rawHash = "partnerCode=" . $partnerCode . "&accessKey=" . $accessKey . "&requestId=" . $requestId . "&bankCode=" . $bankCode . "&amount=" . $amount . "&orderId=" . $orderid . "&orderInfo=" . $orderInfo . "&returnUrl=" . $returnUrl . "&notifyUrl=" . $notifyurl . "&extraData=" . $extraData . "&requestType=" . $requestType;
        $signature = hash_hmac("sha256", $rawHash, $serectkey);

        $data = array(
            'partnerCode' => $partnerCode,
            'accessKey' => $accessKey,
            'requestId' => $requestId,
            'amount' => $amount,
            'orderId' => $orderid,
            'orderInfo' => $orderInfo,
            'returnUrl' => $returnUrl,
            'bankCode' => $bankCode,
            'notifyUrl' => $notifyurl,
            'extraData' => $extraData,
            'requestType' => $requestType,
            'signature' => $signature
        );
        $result = $this->execPostRequest($endpoint, json_encode($data));
        $jsonResult = json_decode($result, TRUE);  // decode json
        error_log(print_r($jsonResult, TRUE)); // log response
        return redirect($jsonResult['payUrl']);
    }

    public function momoSuccess(Request $request)
    {
        if ($request->message == 'Success' && $request->error_code == 0) {
            $total = $request->amount;
            // ? Store order
            $this->storeOrder('momo', 1, $request->transId, $total, 'VND');
            // ? Get account product
            $accountStore = $this->getAccountProduct();
            // ? Increase coupon usage
            $this->increaseCouponUsage();
            // ? Send mail
            $this->sendMail($accountStore);
            // ? Clear session
            $this->clearSession();
            return redirect()->route('payment.success');
        } else {
            return redirect()->route('momo.cancel');
        }
    }

    public function momoCancel()
    {
        toastr()->error('Thanh Toán Thất Bại Vui Lòng Thử Lại!!!');
        return redirect()->route('cart.index');
    }
    // ***************************************************************************************
    // ***************************************************************************************
    // !! VNPAY Payment
    public function payWithVNPay()
    {
        $vnPaySetting = VnpaySetting::first();
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = route('vnpay.success');
        $vnp_TmnCode = $vnPaySetting->terminal_id;//Mã website tại VNPAY
        $vnp_HashSecret = $vnPaySetting->secret_key; //Chuỗi bí mật

        $vnp_TxnRef = 'gamikey' . rand(1, 99999) . time();
        $vnp_OrderInfo = 'Thanh toán đơn hàng';
        $vnp_OrderType = 'Shopping Cart';
        $vnp_Amount = getMainCartTotal() * 100;
        $vnp_Locale = 'VN';
        $vnp_BankCode = 'NCB';
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];

        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
            $inputData['vnp_Bill_State'] = $vnp_Bill_State;
        }

        //var_dump($inputData);
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);//
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        $returnData = array(
            'code' => '00'
            ,
            'message' => 'success'
            ,
            'data' => $vnp_Url
        );

        header('Location: ' . $vnp_Url);
        die();

        // vui lòng tham khảo thêm tại code demo
    }
    // ? VNPay Success
    public function vnpaySuccess(Request $request)
    {
        if ($request->vnp_TransactionStatus == 0 && $request->vnp_ResponseCode == 0) {
            $paidAmount = getMainCartTotal();
            // ? Store order
            $this->storeOrder('vnpay', 1, $request->vnp_TxnRef, $paidAmount, 'VND');
            // ? Get account product
            $accountStore = $this->getAccountProduct();
            // ? Increase coupon usage
            $this->increaseCouponUsage();
            // ? Send mail
            $this->sendMail($accountStore);
            // ? Clear session
            $this->clearSession();
            return redirect()->route('payment.success');
        } else {
            return redirect()->route('vnpay.cancel');
        }
    }
    // ? VNPay Cancel
    public function vnpayCancel()
    {
        toastr()->error('Thanh Toán Thất Bại Vui Lòng Thử Lại!!!');
        return redirect()->route('cart.index');
    }

    // ***************************************************************************************
    // ***************************************************************************************
    // !! Paypal Payment
    public function payWithPaypal()
    {
        $config = $this->paypalConfig();

        $provider = new PayPalClient($config);
        $provider->getAccessToken();

        $paypalSetting = PaypalSetting::first();
        // ? Caculate payable amount depending on currency rate
        $total = getMainCartTotal();
        $payableAmout = round($total / $paypalSetting->currency_rate, 2);

        $response = $provider->createOrder([
            'intent' => 'CAPTURE',
            'application_context' => [
                'return_url' => route("paypal.success"),
                'cancel_url' => route('paypal.cancel'),
            ],
            'purchase_units' => [
                [
                    'amount' => [
                        'value' => $payableAmout,
                        'currency_code' => $config['currency'],
                    ],
                ],
            ],
        ]);

        if (isset($response['id'])) {
            foreach ($response['links'] as $link) {
                if ($link['rel'] == 'approve') {
                    return redirect()->away($link['href']);
                }
            }
        } else {
            return redirect()->route('paypal.cancel');
        }
    }
    // ?? Paypal Success
    public function paypalSuccess(Request $request)
    {
        $config = $this->paypalConfig();
        $provider = new PayPalClient($config);
        $provider->getAccessToken();

        $response = $provider->capturePaymentOrder($request->token);

        if ($response['status'] == 'COMPLETED') {
            $paypalSetting = PaypalSetting::first();
            $total = getMainCartTotal();
            $paidAmount = round($total / $paypalSetting->currency_rate, 2);
            // ? Store order
            $this->storeOrder('paypal', 1, $response['id'], $paidAmount, $config['currency']);
            // ? Get account product
            $accountStore = $this->getAccountProduct();
            // ? Increase coupon usage
            $this->increaseCouponUsage();
            // ? Send mail
            $this->sendMail($accountStore);
            // ? Clear session
            $this->clearSession();
            return redirect()->route('payment.success');
        } else {
            return redirect()->route('paypal.cancel');
        }
    }
    // ? Paypal Cancel
    public function paypalCancel()
    {
        toastr()->error('Thanh Toán Thất Bại Vui Lòng Thử Lại!!!');
        return redirect()->route('cart.index');
    }
}
