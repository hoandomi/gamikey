<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\CouponController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\PaymentSettingController;
use App\Http\Controllers\Backend\PaypalSettingController;
use App\Http\Controllers\Backend\ProductAccountStoreController;
use App\Http\Controllers\Backend\ProductVariantController;
use App\Http\Controllers\Backend\ProductVariantItemController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\TagController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\ProductCommentController;
use App\Http\Controllers\Backend\VNPaySettingController;
use App\Http\Controllers\MomoSettingController;
use Illuminate\Support\Facades\Route;

// !! Dashboard Route
Route::get("dashboard", [AdminController::class, "index"])->name("dashboard");

// !! Categories Routes
Route::put('category/change-status', [CategoryController::class, 'changeStatus'])->name('category.change-status');
Route::resource("category", CategoryController::class);

// !! Sub Categories Routes
Route::put('sub-category/change-status', [SubCategoryController::class, 'changeStatus'])->name('sub-category.change-status');
Route::resource("sub-category", SubCategoryController::class);

// !! Brand Routes
Route::put('brand/change-status', [BrandController::class, 'changeStatus'])->name('brand.change-status');
Route::resource("brand", BrandController::class);

// !! Tag Routes
Route::put('tag/change-status', [TagController::class, 'changeStatus'])->name('tag.change-status');
Route::resource("tag", TagController::class);

// !! Product Routes
Route::get('product/getSubCategories', [ProductController::class, 'getSubCategories'])->name('product.getSubCategories');
Route::put('product/change-status', [ProductController::class, 'changeStatus'])->name('product.change-status');
Route::resource("product", ProductController::class);

// !! Product Variant Routes
Route::put('product-variant/change-status', [ProductVariantController::class, 'changeStatus'])->name('product-variant.change-status');
Route::resource('product-variant', ProductVariantController::class);

// !! Product Variant Item Routes
Route::put('product-variant-item/change-status', [ProductVariantItemController::class, 'changeStatus'])->name('product-variant-item.change-status');
Route::get('product-variant-item/edit/{id}', [ProductVariantItemController::class, 'edit'])->name('product-variant-item.edit');
Route::get('product-variant-item/{productId}/{variantId}', [ProductVariantItemController::class, 'index'])->name('product-variant-item.index');
Route::get('product-variant-item/create/{productId}/{variantId}', [ProductVariantItemController::class, 'create'])->name('product-variant-item.create');
Route::post('product-variant-item', [ProductVariantItemController::class, 'store'])->name('product-variant-item.store');
Route::put('product-variant-item/{productVariantItemId}', [ProductVariantItemController::class, 'update'])->name('product-variant-item.update');
Route::delete('product-variant-item/{productVariantItemId}', [ProductVariantItemController::class, 'destroy'])->name('product-variant-item.destroy');

// !! Product Account Store Routes
Route::resource('product-account-store', ProductAccountStoreController::class);

// !! Coupon Routes
Route::put('coupon/change-status', [CouponController::class, 'changeStatus'])->name('coupon.change-status');
Route::resource('coupon', CouponController::class);

// !! Payment Setting Routes
Route::get('payment-setting', [PaymentSettingController::class, 'index'])->name('payment-setting.index');
// ?? Update Paypay Setting
Route::resource('paypay-setting', PaypalSettingController::class);
// ?? Update VNPay Setting
Route::put('vnpay-setting/{id}', [VNPaySettingController::class, 'update'])->name('vnpay-setting.update');
// ?? Update Momo Setting
Route::put('momo-setting/{id}', [MomoSettingController::class, 'update'])->name('momo-setting.update');
// !! Order Routes
Route::put('order/change-status', [OrderController::class, 'changeStatus'])->name('order.change-status');
Route::get('order', [OrderController::class, 'index'])->name('order.index');
Route::get('order/pending', [OrderController::class, 'pendingOrder'])->name('order.pending-order');
Route::get('order/{id}', [OrderController::class, 'show'])->name('order.show');

// !! User Routes
Route::get('/user', [UserController::class, 'index'])->name('user.index');
Route::get('/user/soft-delete', [UserController::class, 'indexSoftDelete'])->name('user.soft-delete');
Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
Route::delete('/user/delete/{id}', [UserController::class, 'destroy'])->name('user.destroy');
Route::put('/user/update/{id}', [UserController::class, 'update'])->name('user.update');
Route::put('/user/update-password/{id}', [UserController::class, 'updatePassword'])->name('user.update-password');
Route::put('/user/restore/{id}', [UserController::class, 'restore'])->name('user.restore');
Route::put('/user/forge-delete/{id}', [UserController::class, 'forceDelete'])->name('user.force-delete');

// !! Comment Routes
Route::get('/comment', [ProductCommentController::class, 'allComments'])->name('comment.index');
Route::get('/reply-comment', [ProductCommentController::class, 'replyComment'])->name('comment.reply');
Route::put('/comment/change-status', [ProductCommentController::class, 'changeStatusComment'])->name('comment.change-status');
Route::put('/reply-comment/change-status', [ProductCommentController::class, 'changeStatusReplyComment'])->name('reply-comment.change-status');
Route::delete('/comment/delete/{id}', [ProductCommentController::class, 'destroyComment'])->name('comment.destroy');
Route::delete('/reply-comment/delete/{id}', [ProductCommentController::class, 'destroyReplyComment'])->name('reply-comment.destroy');
