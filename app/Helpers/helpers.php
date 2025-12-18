<?php

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Route;
use Gloudemans\Shoppingcart\Facades\Cart;


/* SET SIDEBAR ACTIVE */
function setActive(array $route)
{
    if (is_array($route)) {
        foreach ($route as $r) {
            if (Route::is($r))
                return 'active open';
        }
    }
}

function setActiveslug(array $route)
{
    if (is_array($route)) {
        foreach ($route as $r) {
            if (Route::is($r))
                return 'active';
        }
    }

}

function limitText($text, $limit = 20)
{
    return \Str::limit($text, $limit);
}

function formatPrice($price)
{
    return number_format($price, 0, '.', '.') . ' VNĐ';
}

// ? Get Cart Total amount
function getCartTotal()
{
    $total = 0;
    foreach (Cart::content() as $item) {
        $total += $item->price * $item->qty;
    }
    return $total;
}

// ? get payalbe total amount
function getPayableTotal()
{
    $total = getCartTotal();
    $coupon = Session::get('coupon');
    if ($coupon) {
        $total -= $coupon['discount'];
    }
    return $total;
}
// ? Get Main Cart Total
function getMainCartTotal()
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
        return $total;
    } else {
        return getCartTotal();
    }
}

// ? Get Discount Cart Total
function getDiscountCartTotal()
{
    if (session()->has('coupon')) {
        $coupon = session()->get('coupon');
        $subTotal = getCartTotal();
        if ($coupon['discount_type'] == 'price') {
            $discount = $coupon['discount'];
        } elseif ($coupon['discount_type'] == 'percent') {
            $discount = $subTotal * $coupon['discount'] / 100;
        }
        return $discount;
    } else {
        return 0;
    }
}
// ? Check Payment Method
function checkPaymentMethod()
{
    $paymentMethod = Session::get('checkout.payment_method');
    if ($paymentMethod === 'payPal') {
        return Response::json(['success' => true, 'messages' => 'Paypal']);
    }
}
