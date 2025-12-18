<?php

namespace App\Http\Controllers;

use App\Models\MomoSetting;
use Illuminate\Http\Request;

class MomoSettingController extends Controller
{
    //
    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'status' => 'required|boolean',
                'mode' => 'required|boolean',
                'partner_code' => 'required',
                'access_key' => 'required',
                'secret_key' => 'required',
            ],
            [
                'status.required' => 'Trạng thái không được để trống',
                'mode.required' => 'Chế độ không được để trống',
                'partner_code.required' => 'Mã đối tác không được để trống',
                'access_key.required' => 'Access key không được để trống',
                'secret_key.required' => 'Secret key không được để trống',
            ],
            [
                'status' => 'Trạng thái',
                'mode' => 'Chế độ',
                'partner_code' => 'Mã đối tác',
                'access_key' => 'Access key',
                'secret_key' => 'Secret key',
            ],
        );
        $momoSetting = MomoSetting::updateOrCreate(
            ['id' => $id],
            [
                'status' => $request->status,
                'mode' => $request->mode,
                'partner_code' => $request->partner_code,
                'access_key' => $request->access_key,
                'secret_key' => $request->secret_key,
            ],
        );
        $momoSetting->save();
        toastr()->success('Cập nhật cài đặt Momo thành công', 'Thành công');
        return redirect()->route('admin.payment-setting.index');
    }
}
