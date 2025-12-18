@extends('frontend.layouts.master')

@section('content')
    <main>
        <div class="container profile_user my-5">
            <div class="user-items">
                @include('frontend.user.sidebar.sidebar')
                <div class="user-right">
                    <div class="user-right__items">
                        <h1>Mật Khẩu</h1>

                        <div class="lineX"></div>
                        <div class="col-12">
                            <form action="{{ route('update-password') }}" method="POST">
                                @csrf
                                <div class="form-group my-3">
                                    <label for="new_password">Mật khẩu mới</label>
                                    <input type="password" class="form-control" id="new_password" name="new_password"
                                        placeholder="Nhập mật khẩu mới">
                                </div>
                                <div class="form-group my-3">
                                    <label for="confirm_password">Xác nhận mật khẩu mới</label>
                                    <input type="password" class="form-control" id="confirm_password"
                                        name="confirm_password" placeholder="Xác nhận mật khẩu mới">
                                </div>
                                <button type="submit" class="btnUser btn btn-primary">Lưu thay đổi</button>
                        </div>
                    </div>
                </div>
            </div>
    </main>
@endsection
