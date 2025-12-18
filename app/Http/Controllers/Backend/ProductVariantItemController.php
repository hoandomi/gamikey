<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\ProductVariantItemDataTable;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\ProductVariantItem;
use Illuminate\Http\Request;

class ProductVariantItemController extends Controller
{
    //

    public function index(ProductVariantItemDataTable $dataTable, $productId, $variantId)
    {
        $product = Product::findOrFail($productId);
        $variant = ProductVariant::findOrFail($variantId);
        return $dataTable->render('admin.product.product-variant-item.index', compact('product', 'variant'));
    }

    public function create(string $productId, string $variantId)
    {
        $variant = ProductVariant::findOrFail($variantId);
        $product = Product::findOrFail($productId);
        $productItems = Product::all();
        return view('admin.product.product-variant-item.create', compact('variant', 'product', 'productItems'));
    }

    // ? Store DATA
    public function store(Request $request)
    {
        $request->validate(
            [
                'productItem_id' => 'required',
                'variant_id' => 'required',
                'status' => 'required',
            ],
            [
                'productItem_id.required' => 'Vui lòng chọn sản phẩm',
                'variant_id.required' => 'Vui lòng chọn biến thể',
                'status.required' => 'Vui lòng chọn trạng thái',
            ],
            [
                'productItem_id' => 'Sản phẩm',
                'variant_id' => 'Biến thể',
                'is_default' => 'Mặc định',
                'status' => 'Trạng thái',
            ],
        );

        $productVariantItem = new ProductVariantItem();
        $productVariantItem->product_id = $request->productItem_id;
        $productVariantItem->product_variant_id = $request->variant_id;
        $productVariantItem->status = $request->status;
        $productVariantItem->save();

        toastr()->success('Thêm sản phẩm thành công', 'Thành công');
        return redirect()->route('admin.product-variant-item.index', ["productId" => $request->product_id, "variantId" => $request->variant_id]);
    }

    // ? Edit DATA
    public function edit(string $id)
    {
        $productVariantItem = ProductVariantItem::with('product')->findOrFail($id);
        $productItems = Product::select('name', 'id')->get();
        return view('admin.product.product-variant-item.edit', compact('productVariantItem', 'productItems'));
    }

    // ? Update DATA

    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'name' => 'required',
                'productItem_id' => 'required',
                'status' => 'required',
            ],
            [
                'name.required' => 'Vui lòng nhập tên sản phẩm',
                'productItem_id.required' => 'Vui lòng chọn sản phẩm',
                'status.required' => 'Vui lòng chọn trạng thái',
            ],
            [
                'name' => 'Tên sản phẩm',
                'productItem_id' => 'Sản phẩm',
                'status' => 'Trạng thái',
            ],
        );

        $productVariantItem = ProductVariantItem::findOrFail($id);
        $productVariantItem->name = $request->name;
        $productVariantItem->product_id = $request->productItem_id;
        $productVariantItem->status = $request->status;
        $productVariantItem->save();

        toastr()->success('Cập nhật sản phẩm thành công', 'Thành công');
        return redirect()->route('admin.product-variant-item.index', ["productId" => $productVariantItem->product_id, "variantId" => $productVariantItem->product_variant_id]);
    }

    // ? Change Status
    public function changeStatus(Request $request)
    {
        $productVariantItem = ProductVariantItem::findOrFail($request->id);
        $productVariantItem->status = !$productVariantItem->status;
        $productVariantItem->save();
        return response()->json(['message' => 'Cập nhật trạng thái thành công']);
    }
}
