<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Models\ProductAccountStore;
use App\Models\ProductComment;
use App\Models\ProductReplyComment;
use App\Models\SubCategory;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function index() {
        $users = User::count();
        $products = Product::where('status', 1)->count();
        $comments = ProductComment::where('status', 1)->count() + ProductReplyComment::where('status', 1)->count();
        $orders = Order::where('payment_status', 1)->where('order_status', 1)->count();
        $categories = Category::where('status', 1)->count();
        $sucCategories = SubCategory::where('status', 1)->count();
        $brands = Brand::where('status', 1)->count();
        $productAcccount = ProductAccountStore::where('used', 0)->where('used_by_email', null)->count();
        $amountADay = Order::where('payment_status', 1)->where('order_status', 1)->whereDate('created_at', today())->sum('total_amount');
        $amountAWeek = Order::where('payment_status', 1)->where('order_status', 1)->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])->sum('total_amount');
        $amountAMonth = Order::where('payment_status', 1)->where('order_status', 1)->whereMonth('created_at', now()->month)->sum('total_amount');
        $amountAYear = Order::where('payment_status', 1)->where('order_status', 1)->whereYear('created_at', now()->year)->sum('total_amount');
        return view("admin.dashboard", compact('users', 'products', 'comments', 'orders', 'categories', 'sucCategories', 'brands', 'productAcccount', 'amountADay', 'amountAWeek', 'amountAMonth', 'amountAYear'));
    }
}
