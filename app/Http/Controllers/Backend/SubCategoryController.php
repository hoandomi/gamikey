<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\SubCategoryDataTable;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(SubCategoryDataTable $dataTable)
    {
        return $dataTable->render('admin.sub-category.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categories = Category::where('status', 1)->get();
        return view('admin.sub-category.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate(
            [
                'category_id' => ['required', 'integer'],
                'name' => ['required', 'max:50'],
                'status' => ['required', 'in : 0,1'],
                'description' => ['nullable', 'max:255'],
            ],
            [
                'category_id.required' => 'Cần Chọn Danh Mục',
                'category_id.integer' => 'Danh Mục Này Không Hợp Lệ',
                'name.required' => 'Tên Danh Mục Không Được Để Trống',
                'name.max' => 'Tên Danh Mục Không Được Quá 50 Ký Tự',
                'status.required' => 'Trạng Thái Không Được Để Trống',
                'status.in' => 'Trạng Thái Không Hợp Lệ',
                'description.max' => 'Mô Tả Không Được Quá 500 Ký Tự',
            ],
            [
                'category_id' => 'Danh Mục',
                'name' => 'Tên Danh Mục',
                'status' => 'Trạng Thái',
                'description' => 'Mô Tả',
            ]
        );

        $subCategory = new SubCategory();
        $subCategory->category_id = $request->category_id;
        $subCategory->name = $request->name;
        $subCategory->slug = \Str::slug($request->name);
        $subCategory->status = $request->status;
        $subCategory->description = $request->description;
        $subCategory->save();

        toastr('Danh Mục Phụ Đã Được Tạo Thành Công', 'success');
        return redirect()->route('admin.sub-category.index');
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
        $subCategory = SubCategory::findOrFail($id);
        $categories = Category::where('status', 1)->get();
        return view('admin.sub-category.edit', compact('subCategory', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate(
            [
                'category_id' => ['required', 'integer'],
                'name' => ['required', 'max:50'],
                'status' => ['required', 'in : 0,1'],
                'description' => ['nullable', 'max:255'],
            ],
            [
                'category_id.required' => 'Cần Chọn Danh Mục',
                'category_id.integer' => 'Danh Mục Này Không Hợp Lệ',
                'name.required' => 'Tên Danh Mục Không Được Để Trống',
                'name.max' => 'Tên Danh Mục Không Được Quá 50 Ký Tự',
                'status.required' => 'Trạng Thái Không Được Để Trống',
                'status.in' => 'Trạng Thái Không Hợp Lệ',
                'description.max' => 'Mô Tả Không Được Quá 500 Ký Tự',
            ],
            [
                'category_id' => 'Danh Mục',
                'name' => 'Tên Danh Mục',
                'status' => 'Trạng Thái',
                'description' => 'Mô Tả',
            ],
        );

        $subCategory = SubCategory::findOrFail($id);
        $subCategory->category_id = $request->category_id;
        $subCategory->name = $request->name;
        $subCategory->slug = \Str::slug($request->name);
        $subCategory->status = $request->status;
        $subCategory->description = $request->description;
        $subCategory->save();

        toastr('Danh Mục Phụ Đã Được Cập Nhật Thành Công', 'success' , 'Thành Công');
        return redirect()->route('admin.sub-category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $subCategory = SubCategory::findOrFail($id);
        $subCategory->delete();

        return response(['message' => 'Xóa Danh Mục Phụ Thành Công', 'status' => 'success']);
    }

    // ? Change Status
    public function changeStatus(Request $request) {
        $subCategory = SubCategory::findOrFail($request->id);
        $subCategory->status = !$subCategory->status;
        $subCategory->save();

        return response(['message' => 'Thay Đổi Trạng Thái Thành Công', 'status' => 'success']);
    }
}
