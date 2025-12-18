<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;

class GithubController extends Controller
{
    //

    public function redirectToGithub()
    {
        return Socialite::driver('github')->redirect();
    }

    public function handleGithubCallback()
    {
        $githubUser = Socialite::driver('github')->user();

        // $user->token
        $user = User::firstOrCreate(
            [
                'email' => $githubUser->email,
            ],
            [
                'name' => $githubUser->name,
                'role' => 'user',
                'image' => $githubUser->avatar,
                'github_id' => $githubUser->id,
                'email_verified_at' => now(),
                'password' => bcrypt(str()->random(24)),
            ],
        );
        toastr()->success('Đăng Nhập Thành Công', 'Thành Công');

        Auth::login($user, TRUE);
        if(Auth::user()->role == 'admin'){
            return redirect('/admin/dashboard');
        }
        return redirect('/');
    }
}
