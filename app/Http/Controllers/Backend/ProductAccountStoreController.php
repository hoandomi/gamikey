<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\ProductAccountStoreDataTable;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductAccountStore;
use Illuminate\Http\Request;

class ProductAccountStoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ProductAccountStoreDataTable $dataTables)
    {
        return $dataTables->render('admin.product.product-account-store.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $product = Product::findOrFail(request())->first();
        return view('admin.product.product-account-store.create', compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // ? Vòng lặp

        if ($request->has('username') && $request->has('password') && $request->username != NULL && $request->password != NULL) {
            foreach ($request->username as $key => $value) {
                $request->validate(
                    [
                        'username.' . $key => 'string|max:100|unique:product_account_stores,username',
                        'password.' . $key => 'string|max:100',
                    ],
                    [
                        'username.' . $key . '.unique' => 'Tài khoản đã tồn tại',
                        'username.' . $key . '.max' => 'Tài khoản không được vượt quá 100 ký tự',
                        'password.' . $key . '.max' => 'Mật khẩu không được vượt quá 100 ký tự',

                    ],
                    [
                        'username.' . $key => 'Tài khoản',
                        'password.' . $key => 'Mật khẩu',
                    ],
                );
                $quanityProduct = Product::where('id', $request->product_id)->first();
                $quanityProduct->quantity = $quanityProduct->quantity + 1;
                $quanityProduct->save();
                $product = new ProductAccountStore();
                $product->product_id = $request->product_id;
                $product->username = $request->username[$key] ?? NULL;
                $product->password = $request->password[$key] ?? NULL;
                $product->used = 0;
                $product->save();
            }
        } else if ($request->has('code') && $request->code != NULL) {
            foreach ($request->code as $key => $value) {
                $request->validate(
                    [
                        'code.' . $key => 'string|max:50',
                    ],
                    [
                        'code.' . $key . '.unique' => 'Mã tài khoản đã tồn tại',
                        'code.' . $key . '.max' => 'Mã tài khoản không được vượt quá 30 ký tự',
                    ],
                    [
                        'code.' . $key => 'Mã tài khoản',
                    ],
                );
                $quanityProduct = Product::where('id', $request->product_id)->first();
                $quanityProduct->quantity = $quanityProduct->quantity + 1;
                $quanityProduct->save();
                $product = new ProductAccountStore();
                $product->product_id = $request->product_id;
                $product->code = $request->code[$key];
                $product->used = 0;
                $product->save();
            }
        } else {
            return response(['message' => 'Vui lòng nhập tài khoản hoặc mã tài khoản!'], 400);
        }

        return response(['message' => 'Thêm tài khoản thành công!'], 200);
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
        $product = ProductAccountStore::findOrFail($id);
        return view('admin.product.product-account-store.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        if ($request->has('username') && $request->has('password') && $request->username != NULL && $request->password != NULL) {
            $request->validate(
                [
                    'username' => 'string|max:100',
                    'password' => 'string|max:100',
                ],
                [
                    'username.max' => 'Tài khoản không được vượt quá 100 ký tự',
                    'password.max' => 'Mật khẩu không được vượt quá 100 ký tự',
                ],
                [
                    'username' => 'Tài khoản',
                    'password' => 'Mật khẩu',
                ],
            );
            $product = ProductAccountStore::findOrFail($id);
            $product->username = $request->username;
            $product->password = $request->password;
            $product->save();
            toastr()->success('Cập nhật tài khoản thành công!');
        } else if ($request->has('code') && $request->code != NULL) {
            $request->validate(
                [
                    'code' => 'string|max:50',
                ],
                [
                    'code.max' => 'Mã code không được vượt quá 50 ký tự',
                ],
                [
                    'code' => 'Mã code',
                ],
            );
            $product = ProductAccountStore::findOrFail($id);
            $product->code = $request->code;
            $product->save();
            toastr()->success('Cập nhật mã code thành công!');
        } else {
            toastr()->error('Vui lòng nhập tài khoản hoặc mã tài khoản!');
        }

        return redirect()->route('admin.product-account-store.index', ['product' => $product->product_id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $product = ProductAccountStore::findOrFail($id);
        $product->delete();

        return response(['message' => 'Xóa tài khoản thành công!', 'status' => 'success'], 200);
    }
}
