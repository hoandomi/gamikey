<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\Product;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    // ? Show Cart Detail
    public function index()
    {

        $cartItems = Cart::content();
        if (count($cartItems) == 0) {
            Session::forget('coupon');
        }

        return view('frontend.pages.cart-detail', compact('cartItems'));
    }

    // ? Add To Cart
    public function addToCart(Request $request)
    {
        $productQuanity = Product::where('id', $request->product_id)->first()->quantity;
        $cartItemsQuanity = Cart::content()->where('id', $request->product_id)->first();
        if ($cartItemsQuanity != NULL) {
            if ($productQuanity <= $cartItemsQuanity->qty) {
                return response(['message' => 'Số lượng sản phẩm trong kho không đủ', 'status' => 'error'], 200);
            }
        }

        Cart::add(['id' => $request->product_id, 'name' => $request->name, 'qty' => $request->quantity, 'price' => $request->price, 'weight' => 0, 'options' => ['image' => $request->image, 'slug' => $request->slug, 'category_id' => $request->category_id]]);

        return response(['message' => 'Thêm vào giỏ hàng thành công', 'status' => 'success'], 200);
    }

    // ? Cart Count Products
    public function cartCount()
    {

        return response(['count' => Cart::count()], 200);
    }

    // ? Cart Count Price
    public function cartCountPrice()
    {
        return response(['total' => formatPrice(Cart::total())], 200);
    }

    //? Get Cart Products
    public function getCartProducts()
    {
        return Cart::content();
    }

    // ? Update Cart
    public function updateCart(Request $request)
    {
        $productQuantity = Product::where('id', $request->productId)->first()->quantity;
        if ($request->qty > $productQuantity) {
            Cart::update($request->id, $productQuantity);
            return response(['message' => 'Số lượng sản phẩm trong kho không đủ', 'status' => 'error'], 200);
        }
        Cart::update($request->id, $request->qty);
        return response(['message' => 'Cập nhật giỏ hàng thành công', 'status' => 'success'], 200);
    }

    // ? Delete Cart
    public function deleteCart(Request $request)
    {
        Cart::remove($request->id);
        return response(['message' => 'Xóa sản phẩm khỏi giỏ hàng thành công', 'status' => 'success'], 200);
    }

    // ? Clear Cart
    public function clearCart()
    {
        Cart::destroy();
        return response(['message' => 'Xóa toàn bộ sản phẩm khỏi giỏ hàng thành công', 'status' => 'success'], 200);
    }

    // ? Apply Coupon
    public function applyCoupon(Request $request)
    {
        if ($request->coupon == '' || $request->coupon == NULL) {
            return response(['message' => 'Vui lòng nhập mã giảm giá', 'status' => 'error']);
        }

        $coupon = Coupon::where('status', 1)->where('code', $request->coupon)->first();
        if ($coupon == NULL) {
            return response(['message' => 'Mã giảm giá không tồn tại', 'status' => 'error']);
        } elseif (Carbon::now()->format('Y-m-d H:i:s') < $coupon->start_date) {
            return response(['message' => 'Mã giảm giá chưa được kích hoạt', 'status' => 'error']);
        } elseif (Carbon::now()->format('Y-m-d H:i:s') > $coupon->end_date) {
            return response(['message' => 'Mã giảm giá đã hết hạn', 'status' => 'error']);
        } elseif ($coupon->quantity <= $coupon->total_used) {
            return response(['message' => 'Mã giảm giá đã hết lượt sử dụng', 'status' => 'error']);
        } elseif (Cart::content()->count() == 0) {
            return response(['message' => 'Giỏ hàng của bạn đang trống', 'status' => 'error']);
        } else {
            session()->put('coupon', [
                'code' => $coupon->code,
                'discount' => $coupon->discount,
                'discount_type' => $coupon->discount_type,
            ]);
            return response(['message' => 'Áp dụng mã giảm giá thành công', 'status' => 'success']);
        }
    }
    // ? Caculate Coupon Discount
    public function couponCalculation()
    {
        if (session()->has('coupon')) {
            $coupon = session()->get('coupon');
            $subTotal = getCartTotal();
            if ($coupon['discount_type'] == 'price') {
                $discount = $coupon['discount'];
                $total = $subTotal - $discount;
            } elseif ($coupon['discount_type'] == 'percent') {
                $discount = $subTotal * $coupon['discount'] / 100;
                $total = $subTotal - $discount;
            }
            return response(['cart_total' => $total, 'discount' => $discount, 'status' => 'success'], 200);
        } else {
            return response(['cart_total' => getCartTotal(), 'discount' => 0, 'status' => 'success'], 200);
        }
    }

}
