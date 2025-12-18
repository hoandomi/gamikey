<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CheckOutController extends Controller
{
    //

    public function checkout()
    {
        $cartItems = Cart::content();
        if (count($cartItems) == 0) {
            Session::forget('coupon');
        }
        return view('frontend.pages.checkout', compact('cartItems'));
    }

    public function checkOutFormSubmit(Request $request)
    {
        $request->validate(
            [
                'username' => 'required',
                'email' => 'required|email',
                'phone' => 'required',
                'payment_method' => 'required',
            ],
            [
                'username.required' => 'Họ tên không được để trống',
                'email.required' => 'Email không được để trống',
                'email.email' => 'Email không đúng định dạng',
                'phone.required' => 'Số điện thoại không được để trống',
                'payment_method.required' => 'Phương thức thanh toán không được để trống',
                'payment_method.in' => 'Phương thức thanh toán không hợp lệ',
            ],
            [
                'username' => 'Họ tên',
                'email' => 'Email',
                'phone' => 'Số điện thoại',
                'payment_method' => 'Phương thức thanh toán',
            ],
        );
        $amount = getMainCartTotal();
        Session::put('checkout', [
            'username' => $request->username,
            'email' => $request->email,
            'phone' => $request->phone,
            'payment_method' => $request->payment_method,
            'amount' => $amount,
        ]);
        if ($request->payment_method == 'payPal') {
            return response(['status' => 'success', 'url' => route('paypal.payment')]);
        } else if ($request->payment_method == 'vnPay') {
            return response(['status' => 'success', 'url' => route('vnpay.payment')]);
        } else if ($request->payment_method == 'momo') {
            return response(['status' => 'success', 'url' => route('momo.payment')]);
        }
    }


}
