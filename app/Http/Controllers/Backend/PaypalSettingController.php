<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\PaypalSetting;
use Illuminate\Http\Request;

class PaypalSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('admin.payment-settings.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate(
            [
                'status' => ['required', 'integer'],
                'mode' => ['required', 'integer'],
                'currency_rate' => ['required', 'numeric'],
                'paypalClientId' => ['required', 'string'],
                'paypalSecretKey' => ['required', 'string']
            ],
            [
                'status.required' => 'Trạng thái không được để trống',
                'status.integer' => 'Trạng thái phải là số nguyên',
                'mode.required' => 'Chế độ không được để trống',
                'mode.integer' => 'Chế độ phải là số nguyên',
                'currency_rate.required' => 'Tỷ giá không được để trống',
                'currency_rate.numeric' => 'Tỷ giá phải là số',
                'paypalClientId.required' => 'Client ID không được để trống',
                'paypalClientId.string' => 'Client ID phải là chuỗi',
                'paypalSecretKey.required' => 'Client Secret không được để trống',
                'paypalSecretKey.string' => 'Client Secret phải là chuỗi'
            ],
            [
                'status' => 'Trạng thái',
                'mode' => 'Chế độ',
                'currency_rate' => 'Tỷ giá',
            ],
        );
        $paypalSetting = PaypalSetting::updateOrCreate(
            ['id' => $id],
            [
                'status' => $request->status,
                'mode' => $request->mode,
                'currency_rate' => $request->currency_rate,
                'client_id' => $request->paypalClientId,
                'client_secret' => $request->paypalSecretKey
            ],
        );
        toastr()->success('Cập nhật cài đặt Paypal thành công', 'Thành công');
        return redirect()->route('admin.payment-setting.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
