<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\ProductComment;
use App\Models\ProductReplyComment;
use App\Models\Transaction;
use App\Models\User;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    //
    use ImageUploadTrait;

    public function index()
    {
        return view('frontend.user.index');
    }

    public function cartHistory()
    {
        $userProducts = Order::with('orderProducts')->where('user_id', auth()->user()->id)->get();
        return view('frontend.user.cart', compact('userProducts'));
    }

    public function password()
    {
        return view('frontend.user.password');
    }
    public function updatePassword(Request $request)
    {
        $request->validate(
            [
                'new_password' => ['required', 'string', 'min:8'],
                'confirm_password' => ['required', 'same:new_password'],
            ],
            [
                'new_password.required' => 'Vui lòng nhập mật khẩu mới',
                'new_password.min' => 'Mật khẩu mới phải chứa ít nhất 8 ký tự',
                'confirm_password.required' => 'Vui lòng nhập lại mật khẩu mới',
                'confirm_password.same' => 'Mật khẩu nhập lại không khớp',
            ],
            [
                'new_password' => 'Mật khẩu mới',
                'confirm_password' => 'Nhập lại mật khẩu mới',
            ],
        );
        $user = User::findOrFail(auth()->user()->id);
        $user->password = bcrypt($request->new_password);
        $user->save();

        toastr()->success('Cập nhật mật khẩu thành công');
        return redirect()->route('profile-password');
    }

    public function comment()
    {
        $comments = ProductComment::with('product')->where('user_id', auth()->user()->id)->get();
        $commentsReply = ProductReplyComment::with('product')->where('user_id', auth()->user()->id)->get();
        return view('frontend.user.comment', compact('comments', 'commentsReply'));
    }

    public function updateImageProfile(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user = User::find(auth()->user()->id);

        $user->image = $this->uploadImage($request, "image", "uploads/users");
        $user->save();
        toastr()->success('Cập nhật ảnh đại diện thành công');
        return redirect()->route('profile');
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
        ]);

        $user = User::find(auth()->user()->id);

        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->save();
        toastr()->success('Cập nhật thông tin thành công');
        return redirect()->route('profile');
    }
}
