<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\MomoSetting;
use App\Models\PaypalSetting;
use App\Models\VnpaySetting;
use Illuminate\Http\Request;

class PaymentSettingController extends Controller
{
    //
    public function index()
    {
        $paypalSetting = PaypalSetting::first();
        $vnpaySetting = VnpaySetting::first();
        $momoSetting = MomoSetting::first();
        return view('admin.payment-settings.index', compact('paypalSetting', 'vnpaySetting', 'momoSetting'));
    }


}
