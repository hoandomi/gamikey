<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\CategoryDataTable;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(CategoryDataTable $dataTable)
    {
        return $dataTable->render('admin.category.index');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => ['string', 'required', 'max:50'],
                'status' => ['required', 'in: 0, 1'],
            ],
            [
                'name.required' => 'Tên danh mục không được để trống',
                'name.max' => 'Tên danh mục không được quá 50 ký tự',
                'status.required' => 'Trạng thái không được để trống',
                'status.in' => 'Trạng thái không hợp lệ',
            ],
            [
                'name' => 'Tên danh mục',
                'status' => 'Trạng thái',
                'description' => 'Mô tả',
            ],
        );

        $category = new Category();
        $category->name = $request->name;
        $category->slug = \Str::slug($request->name);
        $category->description = $request->description;
        $category->status = $request->status;
        $category->meta_title = \Str::slug($request->name);
        $category->meta_description = \Str::slug($request->description);
        $category->save();

        toastr('Thêm danh mục thành công', 'success');
        return redirect()->route('admin.category.index');
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
        $category = Category::findOrFail($id);
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate(
            [
                'name' => ['string', 'required', 'max:50'],
                'status' => ['required', 'in: 0, 1'],
            ],
            [
                'name.required' => 'Tên danh mục không được để trống',
                'name.max' => 'Tên danh mục không được quá 50 ký tự',
                'status.required' => 'Trạng thái không được để trống',
                'status.in' => 'Trạng thái không hợp lệ',
            ],
            [
                'name' => 'Tên danh mục',
                'status' => 'Trạng thái',
                'description' => 'Mô tả',
            ],
        );
        $category = Category::findOrFail($id);
        $category->name = $request->name;
        $category->slug = \Str::slug($request->name);
        $category->description = $request->description;
        $category->status = $request->status;
        $category->meta_title = \Str::slug($request->name);
        $category->meta_description = \Str::slug($request->description);
        $category->save();

        toastr('Cập nhật danh mục thành công', 'success', 'Thành công');
        return redirect()->route('admin.category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $category = Category::findOrFail($id);
        $category->delete();
        return response(['message' => 'Xóa danh mục thành công', 'status' => 'success']);
    }

    // ? Change Status
    public function changeStatus(Request $request)
    {
        $category = Category::findOrFail($request->id);
        $category->status = !$category->status;
        $category->save();
        return response(['message' => 'Thay đổi trạng thái thành công', 'status' => 'success']);
    }
}
