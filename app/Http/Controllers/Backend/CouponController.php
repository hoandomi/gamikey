<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\CouponDataTable;
use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(CouponDataTable $dataTables)
    {
        //
        return $dataTables->render('admin.coupon.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.coupon.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate(
            [
                'name' => ['required', 'string', 'max:255'],
                'code' => ['required', 'string', 'max:255'],
                'quantity' => ['required', 'integer'],
                'max_use' => ['required', 'integer'],
                'start_date' => ['required', 'date'],
                'end_date' => ['required', 'date'],
                'discount_type' => ['required'],
                'discount' => ['required', 'numeric'],
                'status' => ['required', 'integer'],
            ],
            [
                'name.required' => 'Tên mã giảm giá không được để trống',
                'name.string' => 'Tên mã giảm giá phải là chuỗi',
                'name.max' => 'Tên mã giảm giá không được vượt quá 255 ký tự',
                'code.required' => 'Mã giảm giá không được để trống',
                'code.string' => 'Mã giảm giá phải là chuỗi',
                'code.max' => 'Mã giảm giá không được vượt quá 255 ký tự',
                'quantity.required' => 'Số lượng mã giảm giá không được để trống',
                'quantity.integer' => 'Số lượng mã giảm giá phải là số nguyên',
                'max_use.required' => 'Số lần sử dụng tối đa không được để trống',
                'max_use.integer' => 'Số lần sử dụng tối đa phải là số nguyên',
                'start_date.required' => 'Ngày bắt đầu giảm giá không được để trống',
                'start_date.date' => 'Ngày bắt đầu giảm giá phải là ngày',
                'end_date.required' => 'Ngày kết thúc giảm giá không được để trống',
                'end_date.date' => 'Ngày kết thúc giảm giá phải là ngày',
                'discount_type.required' => 'Loại giảm giá không được để trống',
                'discount.required' => 'Giá trị giảm giá không được để trống',
                'discount.numeric' => 'Giá trị giảm giá phải là số',
                'status.required' => 'Trạng thái không được để trống',
                'status.integer' => 'Trạng thái phải là số nguyên',
            ],
            [
                'name' => $request->name,
                'code' => $request->code,
                'quantity' => $request->quantity,
                'max_use' => $request->max_use,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'discount_type' => $request->discount_type,
                'discount' => $request->discount,
                'status' => $request->status,
            ],
        );

        $coupon = new Coupon();
        $coupon->name = $request->name;
        $coupon->code = $request->code;
        $coupon->quantity = $request->quantity;
        $coupon->max_use = $request->max_use;
        $coupon->start_date = $request->start_date;
        $coupon->end_date = $request->end_date;
        $coupon->discount_type = $request->discount_type;
        $coupon->discount = $request->discount;
        $coupon->status = $request->status;
        $coupon->save();

        toastr()->success('Thêm mã giảm giá thành công', 'Thành công');
        return redirect()->route('admin.coupon.index');
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
        $coupon = Coupon::findOrFail($id);
        return view('admin.coupon.edit', compact('coupon'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate(
            [
                'name' => ['required', 'string', 'max:255'],
                'code' => ['required', 'string', 'max:255'],
                'quantity' => ['required', 'integer'],
                'max_use' => ['required', 'integer'],
                'start_date' => ['required', 'date'],
                'end_date' => ['required', 'date'],
                'discount_type' => ['required'],
                'discount' => ['required', 'numeric'],
                'status' => ['required', 'integer'],

            ],
            [
                'name.required' => 'Tên mã giảm giá không được để trống',
                'name.string' => 'Tên mã giảm giá phải là chuỗi',
                'name.max' => 'Tên mã giảm giá không được vượt quá 255 ký tự',
                'code.required' => 'Mã giảm giá không được để trống',
                'code.string' => 'Mã giảm giá phải là chuỗi',
                'code.max' => 'Mã giảm giá không được vượt quá 255 ký tự',
                'quantity.required' => 'Số lượng mã giảm giá không được để trống',
                'quantity.integer' => 'Số lượng mã giảm giá phải là số nguyên',
                'max_use.required' => 'Số lần sử dụng tối đa không được để trống',
                'max_use.integer' => 'Số lần sử dụng tối đa phải là số nguyên',
                'start_date.required' => 'Ngày bắt đầu giảm giá không được để trống',
                'start_date.date' => 'Ngày bắt đầu giảm giá phải là ngày',
                'end_date.required' => 'Ngày kết thúc giảm giá không được để trống',
                'end_date.date' => 'Ngày kết thúc giảm giá phải là ngày',
                'discount_type.required' => 'Loại giảm giá không được để trống',
                'discount.required' => 'Giá trị giảm giá không được để trống',
                'discount.numeric' => 'Giá trị giảm giá phải là số',
                'status.required' => 'Trạng thái không được để trống',
                'status.integer' => 'Trạng thái phải là số nguyên',
            ],
            [
                'name' => 'Tên mã giảm giá',
                'code' => 'Mã giảm giá',
                'quantity' => 'Số lượng mã giảm giá',
                'max_use' => 'Số lần sử dụng tối đa',
                'start_date' => 'Ngày bắt đầu giảm giá',
                'end_date' => 'Ngày kết thúc giảm giá',
                'discount_type' => 'Loại giảm giá',
                'discount' => 'Giá trị giảm giá',
                'status' => 'Trạng thái',

            ],
        );

        $coupon = Coupon::findOrFail($id);
        $coupon->name = $request->name;
        $coupon->code = $request->code;
        $coupon->quantity = $request->quantity;
        $coupon->max_use = $request->max_use;
        $coupon->start_date = $request->start_date;
        $coupon->end_date = $request->end_date;
        $coupon->discount_type = $request->discount_type;
        $coupon->discount = $request->discount;
        $coupon->status = $request->status;
        $coupon->save();

        toastr()->success('Cập nhật mã giảm giá thành công', 'Thành công');
        return redirect()->route('admin.coupon.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $coupon = Coupon::find($id);
        $coupon->delete();

        return response(['message' => 'Xóa mã giảm giá thành công', 'status' => 'success'], 200);
    }

    public function changeStatus(Request $request)
    {
        $coupon = Coupon::find($request->id);
        $coupon->status = !$coupon->status;
        $coupon->save();

        return response(['message' => 'Thay đổi trạng thái mã giảm giá thành công', 'status' => 'success'], 200);
    }
}
