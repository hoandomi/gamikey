<?php

use App\Http\Controllers\FrontEnd\CheckOutController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\GithubController;
use App\Http\Controllers\Frontend\GoogleController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\PaymentController;
use App\Http\Controllers\Frontend\ProductCommentController;
use App\Http\Controllers\Frontend\ProductController;
use App\Http\Controllers\Frontend\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::get('/profile-cart-history', [ProfileController::class, 'cartHistory'])->name('profile-cart-history');
    Route::get('/profile-password', [ProfileController::class, 'password'])->name('profile-password');
    Route::get('/profile-comment', [ProfileController::class, 'comment'])->name('profile-comment');
    Route::post('/update-password', [ProfileController::class, 'updatePassword'])->name('update-password');
    Route::post('/update-image-profile', [ProfileController::class, 'updateImageProfile'])->name('update-image-profile');
    Route::post('/update-profile', [ProfileController::class, 'updateProfile'])->name('update-profile');
    // ? Product Comment Route
    Route::get('/get-product-comment', [ProductCommentController::class, 'getComment'])->name('get-product-comment');
    Route::post('/product-comment', [ProductCommentController::class, 'create'])->name('product-comment.create');
    Route::post('/product-reply-comment', [ProductCommentController::class, 'replyComment'])->name('product-reply-comment.create');
});

require __DIR__ . '/auth.php';

Route::get('/github/redirect', [GithubController::class, 'redirectToGithub'])->name('github.redirect');
Route::get('/github/callback', [GithubController::class, 'handleGithubCallback'])->name('github.callback');

Route::get('/google/redirect', [GoogleController::class, 'redirectToGoogle'])->name('google.redirect');
Route::get('/google/callback', [GoogleController::class, 'handleGoogleCallback'])->name('google.callback');

// ? Search Route
Route::post('/search', [HomeController::class, 'searchItem'])->name('search-products');

// !! Product Routes
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products-detail/{slug}', [ProductController::class, 'show'])->name('products.show');

// !! Cart Routes
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::get('/cart-total', [CartController::class, 'cartCountPrice'])->name('cart.total');
Route::get('/cart-products', [CartController::class, 'getCartProducts'])->name('cart-products');
Route::post('/cart-clear', [CartController::class, 'clearCart'])->name('cart.clear');
Route::post('/cart-add', [CartController::class, 'addToCart'])->name('cart.store');
Route::post('/cart-delete', [CartController::class, 'deleteCart'])->name('cart.delete');
Route::get('/cart-count', [CartController::class, 'cartCount'])->name('cart.count');
Route::post('/cart-update', [CartController::class, 'updateCart'])->name('cart.update');
Route::get('/apply-coupon', [CartController::class, 'applyCoupon'])->name('apply-coupon');
Route::get('/coupon-caculation', [CartController::class, 'couponCalculation'])->name('coupon-calculation');

// !! Checkout Routes
Route::get('/checkout', [CheckOutController::class, 'checkout'])->name('checkout');
Route::post('/checkout/formSubmit', [CheckOutController::class, 'checkOutFormSubmit'])->name('checkout.formSubmit');

// !! Payment Routes
Route::get('payment-success', [PaymentController::class, 'paymentSuccess'])->name('payment.success');
// ?? Paypal Payment
Route::get('/paypal/payment', [PaymentController::class, 'payWithPaypal'])->name('paypal.payment');
Route::get('/paypal/success', [PaymentController::class, 'paypalSuccess'])->name('paypal.success');
Route::get('/paypal/cancel', [PaymentController::class, 'paypalCancel'])->name('paypal.cancel');
// ?? VNPay Payment
Route::get('/vnpay/payment', [PaymentController::class, 'payWithVNPay'])->name('vnpay.payment');
Route::get('/vnpay/success', [PaymentController::class, 'vnpaySuccess'])->name('vnpay.success');
Route::get('/vnpay/cancel', [PaymentController::class, 'vnpayCancel'])->name('vnpay.cancel');
// ?? MOMO Payment
Route::get('/momo/payment', [PaymentController::class, 'payWithMomo'])->name('momo.payment');
Route::get('/momo/success', [PaymentController::class, 'momoSuccess'])->name('momo.success');
Route::get('/momo/cancel', [PaymentController::class, 'momoCancel'])->name('momo.cancel');
