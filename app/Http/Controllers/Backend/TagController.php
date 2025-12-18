<?php

namespace App\Http\Controllers\Backend;



use App\DataTables\TagDataTable;
use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(TagDataTable $dataTables)
    {
        //
        return $dataTables->render('admin.tag.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.tag.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate(
            [
                'name' => ['required', 'string', 'max:10'],
                'status' => ['required', 'integer', 'in:0,1'],
            ],
            [
                'name.required' => 'Tên Nhãn không được để trống',
                'name.string' => 'Tên Nhãn phải là chuỗi',
                'name.max' => 'Tên Nhãn không được vượt quá 10 ký tự',
                'status.required' => 'Trạng thái không được để trống',
                'status.integer' => 'Trạng thái không hợp lệ',
                'status.in' => 'Trạng thái không hợp lệ',
            ],
            [
                'name' => 'Tên Nhãn',
                'status' => 'Trạng thái',
            ],
        );

        $tag = new Tag();
        $tag->name = $request->name;
        $tag->slug = \Str::slug($request->name);
        $tag->status = $request->status;
        $tag->save();

        toastr()->success('Thêm mới Nhãn thành công', 'Thành Công');
        return redirect()->route('admin.tag.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $tag = Tag::findOrFail($id);
        return view('admin.tag.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate(
            [
                'name' => ['required', 'string', 'max:10'],
                'status' => ['required', 'integer', 'in:0,1'],
            ],
            [
                'name.required' => 'Tên Nhãn không được để trống',
                'name.string' => 'Tên Nhãn phải là chuỗi',
                'name.max' => 'Tên Nhãn không được vượt quá 10 ký tự',
                'status.required' => 'Trạng thái không được để trống',
                'status.integer' => 'Trạng thái không hợp lệ',
                'status.in' => 'Trạng thái không hợp lệ',
            ],
            [
                'name' => 'Tên Nhãn',
                'status' => 'Trạng thái',
            ],
        );

        $tag = Tag::findOrFail($id);
        $tag->name = $request->name;
        $tag->slug = \Str::slug($request->name);
        $tag->status = $request->status;
        $tag->save();

        toastr()->success('Cập nhật Nhãn thành công', 'Thành Công');
        return redirect()->route('admin.tag.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $tag = Tag::findOrFail($id);
        $tag->delete();

        return response()->json(['message' => 'Xóa Nhãn thành công', 'status' => 'success']);
    }

    public function changeStatus(Request $request)
    {
        $tag = Tag::findOrFail($request->id);
        $tag->status = !$tag->status;
        $tag->save();

        return response()->json(['message' => 'Thay đổi trạng thái Nhãn thành công', 'status' => 'success']);
    }
}
