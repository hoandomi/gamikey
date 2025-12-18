@extends('frontend.layouts.master')

@section('content')
    <main class="pt-5">
        <section class="container">
            <div class="cart_container">
                <div class="cart_container_section col-12 rounded p-5" style="background-color: white">
                    <div class="col-12 d-flex justify-content-center">
                        <img src="{{ asset('frontend/assets/images/payment_success.png') }}" alt="">
                    </div>
                    <div class="col-12 text-center">
                        <h2>Thanh Toán Thành Công</h2>
                    </div>
                    <div class="col-12 text-center">
                        <h3>Cảm Ơn Bạn Đã Tin Tưởng Và Mua Sắm Tại Gamikey</h3>
                    </div>

                    <div class="col-12 text-center">
                        <!-- Google -->
                        Bấm Vào Icon Dưới Đây Để Kiểm Tra Đơn Hàng <br>
                        <a class="btn btn-primary" style="background-color: #dd4b39; padding: 10px 50px;"
                            href="https://mail.google.com/mail/u/0/#all" role="button" target="_blank"><i
                                class="fab fa-google"></i></a>
                    </div>
        </section>
    </main>
@endsection
