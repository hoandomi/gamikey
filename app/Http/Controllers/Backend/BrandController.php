<?php

namespace App\Http\Controllers\backend;

use App\DataTables\BrandDataTable;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    use ImageUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(BrandDataTable $dataTable)
    {
        //
        return $dataTable->render("admin.brand.index");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view("admin.brand.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate(
            [
                'name' => ['required', 'string', 'max:20'],
                'description' => ['nullable', 'string'],
                'status' => ['required', 'in:0,1'],
                'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,gif,svg,webp', 'max:5012'],
            ],
            [
                'name.required' => 'Tên thương hiệu không được để trống',
                'name.max' => 'Tên thương hiệu không được quá 20 ký tự',
                'status.required' => 'Trạng thái không được để trống',
                'status.in' => 'Trạng thái không hợp lệ',
                'image.image' => 'Ảnh không hợp lệ',
                'image.mimes' => 'Ảnh không đúng định dạng jpg, jpeg, png, gif',
                'image.max' => 'Ảnh không được quá 5MB',
            ],
            [
                'name' => 'Tên thương hiệu',
                'description' => 'Mô tả',
                'status' => 'Trạng thái',
                'image' => 'Ảnh',
            ],
        );

        $brand = new Brand();
        $brand->name = $request->name;
        $brand->slug = \Str::slug($request->name);
        $brand->image = $this->uploadImage($request, 'image', 'uploads/brands');
        $brand->description = $request->description;
        $brand->status = $request->status;
        $brand->save();

        toastr()->success('Thêm thương hiệu thành công', 'Thành Công');
        return redirect()->route('admin.brand.index');
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
        $brand = Brand::findOrFail($id);
        return view("admin.brand.edit", compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate(
            [
                'name' => ['required', 'string', 'max:20'],
                'description' => ['nullable', 'string'],
                'status' => ['required', 'in:0,1'],
                'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,gif,svg,webp', 'max:5012'],
            ],
            [
                'name.required' => 'Tên thương hiệu không được để trống',
                'name.max' => 'Tên thương hiệu không được quá 20 ký tự',
                'status.required' => 'Trạng thái không được để trống',
                'status.in' => 'Trạng thái không hợp lệ',
            ],
            [
                'name' => 'Tên thương hiệu',
                'description' => 'Mô tả',
                'status' => 'Trạng thái',
            ],
        );

        $brand = Brand::findOrFail($id);
        $brand->name = $request->name;
        $brand->slug = \Str::slug($request->name);
        $brand->image = $this->updateImage($request, 'image', 'uploads/brands', $brand->oldImage);
        $brand->description = $request->description;
        $brand->status = $request->status;
        $brand->save();

        toastr()->success('Cập Nhật Thương Hiệu Thành Công', 'Thành Công');
        return redirect()->route('admin.brand.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $brand = Brand::findOrFail($id);
        $brand->delete();

        return response(['message' => 'Xóa thương hiệu thành công', 'status' => 'success']);
    }

    public function changeStatus(Request $request)
    {
        $brand = Brand::findOrFail($request->id);
        $brand->status = !$brand->status;
        $brand->save();

        return response(['message' => 'Thay đổi trạng thái thành công', 'status' => 'success']);
    }
}
