<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;

class GoogleController extends Controller
{
    //

    public function redirectToGoogle()
    {
        return Socialite::driver("google")->redirect();
    }

    public function handleGoogleCallback()
    {
        $googleUser = Socialite::driver('google')->user();

        // $user->token
        $user = User::firstOrCreate(
            [
                'email' => $googleUser->email,
            ],
            [
                'name' => $googleUser->name,
                'image' => $googleUser->avatar,
                'role' => 'user',
                'google_id' => $googleUser->id,
                'email_verified_at' => now(),
                'password' => bcrypt(str()->random(24)),
            ],
        );
        toastr()->success('Đăng Nhập Thành Công', 'Thành Công');

        Auth::login($user, TRUE);
        if (Auth::user()->role == 'admin') {
            return redirect('/admin/dashboard');
        }
        return redirect('/');
    }
}
