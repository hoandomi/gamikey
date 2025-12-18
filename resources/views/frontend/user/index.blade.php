@extends('frontend.layouts.master')

@section('content')
    <!-- ************************* Main ************************* -->
    <main>
        <div class="container profile_user my-5">
            <div class="user-items">
                 @include('frontend.user.sidebar.sidebar')
                <div class="user-right">
                    <div class="user-right__items">
                        <h1>Tổng quan</h1>
                        <div class="user-right-infoProfile">
                            <div class="user-right-infoProfile-item">
                                <h4>Email</h4>
                                <p id="gmail_user">{{ Auth::user()->email }}</p>
                            </div>
                            <div class="user-right-infoProfile-item">
                                <h4>Họ và tên</h4>
                                <p id="name_user">{{ Auth::user()->name }}</p>
                            </div>
                            <div class="user-right-infoProfile-item">
                                <h4>Nhóm khách hàng</h4>
                                <p id="kind_user">{{ Str::upper(Auth::user()->role) }}</p>
                            </div>
                            <div class="user-right-infoProfile-item">
                                <h4>Đã tích lũy</h4>
                                @php
                                    $total = 0;
                                    $ordersTotalAmount = \App\Models\Order::where('user_id', Auth::user()->id)
                                        ->where('payment_status', 1)
                                        ->get();
                                    foreach ($ordersTotalAmount as $order) {
                                        $total += $order->total_amount;
                                    }
                                @endphp
                                <p id="moneypast_user">{{ formatPrice($total) }}
                            </div>
                            <div class="user-right-infoProfile-item">
                                <h4>Ngày tham gia</h4>
                                <p id="datejoin_user">{{ Auth::user()->created_at }}</p>
                            </div>
                        </div>
                        <div class="user-right-avatar">
                            <div class="user-right-avatar-items">
                                <img loading="lazy" id="userImage" src="{{ asset(Auth::user()->image) }}" alt="Ảnh đại diện"
                                    style="border-radius: 9999px" />
                                <div class="user-right-avatar-item">
                                    <form action="{{ route('update-image-profile') }}" method="POST"
                                        enctype="multipart/form-data" id="formImageUser">
                                        @csrf
                                        <div class="js col-12">
                                            <div class="col-6">
                                                <input type="file" name="image" id="file-1"
                                                    style="padding: 10px 20px;" class="inputfile inputfile-1"
                                                    data-multiple-caption="{count} files selected" multiple />
                                                <label for="file-1"><i class="fas fa-cloud-upload fa-fw"></i> <span>Chọn
                                                        Ảnh&hellip;</span></label>
                                            </div>
                                            <div class="col-6">
                                                <button type="submit" class="btnUser">Lưu thay đổi</button>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="lineY"></div>
                                    <div>
                                        <p>
                                            Vui lòng chọn ảnh nhỏ hơn 5MB <br />
                                            <br />
                                            Chọn hình ảnh phù hợp, không phản
                                            cảm
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="changed-profile-user">
                        <form action="{{ route('update-profile') }}" method="POST">
                            @csrf
                            <h3>Cá Nhân</h3>
                            <div class="input-container">
                                <input name="name" type="text" id="userName" class="text-input"
                                    placeholder="Họ và tên" required value="{{ Auth::user()->name }}" />
                                <label for="userName" class="label">Họ và Tên</label>
                            </div>
                            <div class="input-container">
                                <input name="phone" type="tel" id="userPhone" class="text-input"
                                    placeholder="Số điện thoại" value="{{ Auth::user()->phone }}" required />
                                <label for="userPhone" class="label">Số điện thoại</label>
                            </div>
                            <button id="changedUserProdile" class="btnUser">
                                Lưu thay đổi
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
