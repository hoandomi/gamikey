<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\UserDataTable;
use App\DataTables\UserSoftDeleteDataTable;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\ProductAccountStore;
use App\Models\Transaction;
use App\Models\User;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    use ImageUploadTrait;
    public function index(UserDataTable $dataTables)
    {
        return $dataTables->render('admin.users.index');
    }

    public function indexSoftDelete(UserSoftDeleteDataTable $dataTables)
    {
        return $dataTables->render('admin.users.usersoftdelete');
    }

    // ? Edit User

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    public function updatePassword(Request $request, $id)
    {
        $request->validate(
            [
                'new_password' => 'required|min:6',
                'confirm_password' => 'required|same:new_password',
            ],
            [
                'new_password.required' => 'Mật khẩu không được để trống',
                'new_password.min' => 'Mật khẩu phải có ít nhất 6 ký tự',
                'confirm_password.required' => 'Xác nhận mật khẩu không được để trống',
                'confirm_password.same' => 'Mật khẩu không khớp',
            ],
            [
                'new_password' => 'Mật khẩu mới',
                'confirm_password' => 'Xác nhận mật khẩu',
            ],
        );

        $user = User::findOrFail($id);
        $user->password = bcrypt($request->password);
        $user->save();

        toastr()->success('Cập nhật mật khẩu thành công', 'Thành công');
        return redirect()->route('admin.user.index');
    }

    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'name' => 'required',
                'email' => 'required|email|unique:users,email,' . $id,
                'phone' => 'required',
                'role' => 'required',
            ],
            [
                'name.required' => 'Tên không được để trống',
                'email.required' => 'Email không được để trống',
                'email.email' => 'Email không đúng định dạng',
                'email.unique' => 'Email đã tồn tại',
                'phone.required' => 'Số điện thoại không được để trống',
                'role.required' => 'Vui lòng chọn quyền',
            ],
            [
                'name' => 'Tên',
                'email' => 'Email',
                'phone' => 'Số điện thoại',
                'role' => 'Quyền',
            ],
        );

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->image = $this->updateImage($request, 'image', 'uploads/users', $user->oldImage);
        $user->phone = $request->phone;
        $user->role = $request->role;
        $user->save();

        toastr()->success('Cập nhật người dùng thành công', 'Thành công');
        return redirect()->route('admin.user.index');
    }

    // ? Soft Delete User
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return response(['message' => 'Xóa người dùng thành công', 'status' => 'success'], 200);
    }

    // ? Restore User
    public function restore($id)
    {
        $user = User::withTrashed()->findOrFail($id);
        $user->restore();

        return response(['message' => 'Khôi phục người dùng thành công', 'status' => 'success'], 200);
    }

    // ? Force Delete User
    public function forceDelete($id)
    {
        $user = User::withTrashed()->findOrFail($id);
        $order = Order::where('user_id', $id)->get();
        foreach ($order as $item) {
            // ? Delete OrderProducts from Order ID
            $orderProducts = OrderProduct::where('order_id', $item->id)->delete();
            // ? Delete Account Store from Order ID
            $accountStore = ProductAccountStore::where('order_id', $item->id)->delete();
            // ? Delete Transaction from Order ID
            $transaction = Transaction::where('order_id', $item->id)->delete();
            // ? Delete Order from User ID
            $item->delete();
        }
        // ? Delete Image
        if (file_exists(public_path($user->image))) {
            unlink(public_path($user->image));
        }
        $user->forceDelete();

        return response(['message' => 'Xóa vĩnh viễn người dùng thành công', 'status' => 'success'], 200);
    }
}
