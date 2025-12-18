<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use App\Models\VnpaySetting;
use Illuminate\Http\Request;

class VNPaySettingController extends Controller
{
    //
    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'status' => ['required', 'integer'],
                'mode' => ['required', 'integer'],
                'vnpayterminalid' => ['required', 'string'],
                'vnpay_hashSecret' => ['required', 'string'],
            ],
            [
                'status.required' => 'Trạng thái không được để trống',
                'status.integer' => 'Trạng thái phải là số nguyên',
                'mode.required' => 'Chế độ không được để trống',
                'mode.integer' => 'Chế độ phải là số nguyên',
                'vnpayterminalid.required' => 'Mã terminal không được để trống',
                'vnpayterminalid.string' => 'Mã terminal phải là chuỗi',
                'vnpay_hashSecret.required' => 'Mã bí mật không được để trống',
                'vnpay_hashSecret.string' => 'Mã bí mật phải là chuỗi',
            ],
            [
                'status' => 'Trạng thái',
                'mode' => 'Chế độ',
                'vnpayterminalid' => 'Mã terminal',
            ],
        );
        $vnpaySetting = VnpaySetting::updateOrCreate(
            ['id' => $id],
            [
                'status' => $request->status,
                'mode' => $request->mode,
                'terminal_id' => $request->vnpayterminalid,
                'secret_key' => $request->vnpay_hashSecret,
            ],
        );

        toastr()->success('Cập nhật cài đặt VNPay thành công', 'Thành công');
        return redirect()->route('admin.payment-setting.index');
    }
}
