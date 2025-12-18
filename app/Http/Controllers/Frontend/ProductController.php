<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductComment;
use App\Models\ProductVariantItem;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function index(Request $request)
    {
        if ($request->has('brand')) {
            $products = Product::with('brand', 'category')
                ->where('status', 1)
                ->whereHas('brand', function ($query) use ($request) {
                    $query->where('slug', $request->brand);
                })
                ->when($request->has('startRangePrice') || $request->has('endRangePrice'), function ($query) use ($request) {
                    $query->whereBetween('price', [$request->startRangePrice, $request->endRangePrice]);
                })
                ->when($request->has('sort'), function ($query) use ($request) {
                    if ($request->sort == 'asc') {
                        $query->orderBy('price', 'asc');
                    } elseif ($request->sort == 'desc') {
                        $query->orderBy('price', 'desc');
                    } elseif ($request->sort == 'new') {
                        $query->orderBy('created_at', 'desc');
                    } elseif ($request->sort == 'old') {
                        $query->orderBy('created_at', 'asc');
                    }
                })
                ->paginate(21);
            $name = Brand::where('slug', $request->brand)->select('name')->first();
            $nameSlug = $name->name;
        } elseif ($request->has('category')) {
            $products = Product::with('brand', 'category')
                ->where('status', 1)
                ->whereHas('category', function ($query) use ($request) {
                    $query->where('slug', $request->category);
                })
                ->when($request->has('startRangePrice') || $request->has('endRangePrice'), function ($query) use ($request) {
                    $query->whereBetween('price', [$request->startRangePrice, $request->endRangePrice]);
                })
                ->when($request->has('sort'), function ($query) use ($request) {
                    if ($request->sort == 'asc') {
                        $query->orderBy('price', 'asc');
                    } elseif ($request->sort == 'desc') {
                        $query->orderBy('price', 'desc');
                    } elseif ($request->sort == 'new') {
                        $query->orderBy('created_at', 'desc');
                    } elseif ($request->sort == 'old') {
                        $query->orderBy('created_at', 'asc');
                    }
                })
                ->paginate(21);
            $name = Category::where('slug', $request->category)->select('name')->first();
            $nameSlug = $name->name;
        } elseif ($request->has('type')) {
            $products = Product::where('status', 1)->where('slug_type', $request->type)
                ->when($request->has('startRangePrice') || $request->has('endRangePrice'), function ($query) use ($request) {
                    $query->whereBetween('price', [$request->startRangePrice, $request->endRangePrice]);
                })
                ->when($request->has('sort'), function ($query) use ($request) {
                    if ($request->sort == 'asc') {
                        $query->orderBy('price', 'asc');
                    } elseif ($request->sort == 'desc') {
                        $query->orderBy('price', 'desc');
                    } elseif ($request->sort == 'new') {
                        $query->orderBy('created_at', 'desc');
                    } elseif ($request->sort == 'old') {
                        $query->orderBy('created_at', 'asc');
                    }
                })
                ->paginate(21);
            $name = Product::where('slug_type', $request->type)->select('type')->first();
            $nameSlug = $name->type;
        } elseif ($request->has('search')) {
            $products = Product::where('status', 1)
                ->where('name', 'like', '%' . $request->search . '%')
                ->when($request->has('startRangePrice') || $request->has('endRangePrice'), function ($query) use ($request) {
                    $query->whereBetween('price', [$request->startRangePrice, $request->endRangePrice]);
                })
                ->when($request->has('sort'), function ($query) use ($request) {
                    if ($request->sort == 'asc') {
                        $query->orderBy('price', 'asc');
                    } elseif ($request->sort == 'desc') {
                        $query->orderBy('price', 'desc');
                    } elseif ($request->sort == 'new') {
                        $query->orderBy('created_at', 'desc');
                    } elseif ($request->sort == 'old') {
                        $query->orderBy('created_at', 'asc');
                    }
                })
                ->paginate(21);
            $nameSlug = $request->search;
        } else {
            $products = Product::with('brand', 'category')->where('status', 1)
                ->when($request->has('startRangePrice') || $request->has('endRangePrice'), function ($query) use ($request) {
                    $query->whereBetween('price', [$request->startRangePrice, $request->endRangePrice]);
                })
                ->when($request->has('sort'), function ($query) use ($request) {
                    if ($request->sort == 'asc') {
                        $query->orderBy('price', 'asc');
                    } elseif ($request->sort == 'desc') {
                        $query->orderBy('price', 'desc');
                    } elseif ($request->sort == 'new') {
                        $query->orderBy('created_at', 'desc');
                    } elseif ($request->sort == 'old') {
                        $query->orderBy('created_at', 'asc');
                    }
                })
                ->paginate(21);
            $nameSlug = "Sản Phẩm";
        }
        // ? Lấy danh mục và eagle loading subcategory và count product
        $categories = Category::with('products')->withAvg('products', 'price')->withCount('products')->get();
        $newProducts = Product::where('status', 1)->orderBy('created_at', 'desc')->take(5)->select('image', 'name', 'price', 'slug')->get();
        return view('frontend.pages.product', compact('products', 'categories', 'nameSlug', 'newProducts'));
    }

    public function show(Request $request)
    {
        $product = Product::with('productComments')
            ->where('slug', $request->slug)
            ->withCount([
                'productComments as total_comments',
                'productComments as rating_5' => function ($query) {
                    $query->where('rating', 5);
                },
                'productComments as rating_4' => function ($query) {
                    $query->where('rating', 4);
                },
                'productComments as rating_3' => function ($query) {
                    $query->where('rating', 3);
                },
                'productComments as rating_2' => function ($query) {
                    $query->where('rating', 2);
                },
                'productComments as rating_1' => function ($query) {
                    $query->where('rating', 1);
                },
            ])
            ->first();

        if ($product) {
            $averageRating = $product->total_comments > 0 ?
                round($product->productComments->sum('rating') / $product->total_comments) :
                0;

            $rate5Star = $product->rating_5;
            $rate4Star = $product->rating_4;
            $rate3Star = $product->rating_3;
            $rate2Star = $product->rating_2;
            $rate1Star = $product->rating_1;
        } else {
            $rate5Star = 0;
            $rate4Star = 0;
            $rate3Star = 0;
            $rate2Star = 0;
            $rate1Star = 0;
        }
        $products = Product::with('category')->where('status', 1)->where('category_id', $product->category_id)->orderBy('created_at', 'desc')->take(6)->select('image', 'name', 'price', 'slug', 'category_id', 'purchased')->get();
        $productVariantItemsId = $product->productVariantItems->select('product_variant_id');
        $productVariantItems = ProductVariantItem::with('product')->whereIn('product_variant_id', $productVariantItemsId)->get();
        $comments = ProductComment::with('user')
            ->where('status', 1)
            ->where('product_id', $product->id)
            ->orderBy('created_at', 'desc')
            ->get();
        $commentsCount = $comments->count();
        $orderProductCount = $product->orderProducts->count();
        return view('frontend.pages.product-detail', compact('product', 'productVariantItems', 'products', 'comments', 'commentsCount', 'orderProductCount', 'averageRating', 'rate5Star', 'rate4Star', 'rate3Star', 'rate2Star', 'rate1Star'));
    }
}
