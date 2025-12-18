<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\ProductVariantDataTable;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Http\Request;

class ProductVariantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request,ProductVariantDataTable $dataTables)
    {
        //
        $product = Product::findOrFail($request->product);
        return $dataTables->render('admin.product.product-variant.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.product.product-variant.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate(
            [
                'product_id' => 'required|integer',
                'name' => 'required|max:200',
                'status' => 'required',
            ],
            [
                'product_id.required' => 'Tên biến thể không được để trống',
                'product_id.integer' => 'Tên biến thể phải là số',
                'name.required' => 'Tên biến thể không được để trống',
                'name.max' => 'Tên biến thể không được vượt quá 200 ký tự',
                'status.required' => 'Trạng thái không được để trống',
            ],
            [
                'product_id' => 'Tên biến thể',
                'name' => 'Tên biến thể',
                'status' => 'Trạng thái',
            ],
        );

        $variant = new ProductVariant();
        $variant->product_id = $request->product_id;
        $variant->name = $request->name;
        $variant->status = $request->status;
        $variant->save();

        toastr()->success('Thêm biến thể thành công');
        return redirect()->route('admin.product-variant.index', ['product' => $request->product_id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $variant = ProductVariant::findOrFail($id);
        return view('admin.product.product-variant.edit', compact('variant'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate(
            [
                'name' => 'required|max:200',
                'status' => 'required',
            ],
            [
                'name.required' => 'Tên biến thể không được để trống',
                'name.max' => 'Tên biến thể không được vượt quá 200 ký tự',
                'status.required' => 'Trạng thái không được để trống',
            ],
            [
                'name' => 'Tên biến thể',
                'status' => 'Trạng thái',
            ],
        );

        $variant = ProductVariant::findOrFail($id);
        $variant->name = $request->name;
        $variant->status = $request->status;
        $variant->save();

        toastr()->success('Cập nhật biến thể thành công', 'Thành công');
        return redirect()->route('admin.product-variant.index', ['product' => $variant->product_id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $variant = ProductVariant::findOrFail($id);
        $product_id = $variant->product_id;
        $variant->delete();

        return response()->json(['message' => 'Xóa biến thể thành công', 'status' => 'success']);
    }

    public function changeStatus(Request $request)
    {
        $variant = ProductVariant::findOrFail($request->id);
        $variant->status = !$variant->status;
        $variant->save();

        return response()->json(['message' => 'Cập nhật trạng thái thành công', 'status' => 'success']);
    }
}
