<!-- ************************* Hamburger Menu ************************* -->
<div class="hamburger-menu">
    <div class="actionBtn">
        <div id="BtnClose">
            <i style="color: white;" class="fas fa-times"></i>
        </div>
    </div>
    <div class="hamburger-menu_items">
        <ul class="menu_items_mobile">
            @if (Auth::check())
                <li class="menu_item_mobile">
                    <p>Xin Chào: {{Auth::user()->name}}</p>
                </li>
                <li class="menu_item_mobile">
                    <a href="{{ route('logout') }}">Đăng Xuất</a>
                </li>
                @else
                <li class="menu_item_mobile">
                    <a href="{{ route('login') }}">Đăng Nhập</a>
                </li>
                <li class="menu_item_mobile">
                    <a href="{{ route('register') }}">Đăng Ký</a>
                </li>
            @endif
            <li class="menu_item_mobile">
                <a href="{{ route('home') }}">Trang Chủ</a>
            </li>
            <li class="menu_item_mobile">
                <a href="{{ route('products.index') }}">Danh Mục</a>
            </li>
            <li class="menu_item_mobile">
                <a href="{{ route('products.index') }}">Thương Hiệu</a>
            </li>
            <li class="menu_item_mobile">
                <a href="{{ route('products.index', ['type' => 'tai-khoan']) }}">Tài Khoản</a>
            </li>
            <li class="menu_item_mobile">
                <a href="{{ route('products.index', ['type' => 'key']) }}">Key Active</a>
            </li>
            <li class="menu_item_mobile">
                <a href="{{ route('products.index', ['type' => 'nang-cap']) }}">Nâng Cấp</a>
            </li>
            <li class="menu_item_mobile">
                <a href="">Giới Thiệu</a>
            </li>
            <li class="menu_item_mobile">
                <a href="">Liên Hệ</a>
            </li>
        </ul>
    </div>
</div>
<!-- Footer -->
<footer class="text-center text-lg-start mt-5 text-muted">
    <!-- Section: Links  -->
    <section class="">
        <div class="container text-center text-md-start mt-5">
            <!-- Grid row -->
            <div class="row mt-3">
                <!-- Grid column -->
                <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                    <!-- Content -->
                    <img loading="lazy" style="width: 200px; height: 100%;"
                        src="{{ asset('frontend/assets/images/Logo-Gamikey-1024x576.png.webp') }}" alt="">
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold mb-4">
                        Giới Thiệu
                    </h6>
                    <p>
                        <a href="#!" class="text-reset">Liên Hệ</a>
                    </p>
                    <p>
                        <a href="#!" class="text-reset">Bảo Hành Và Hoàn Tiền</a>
                    </p>
                    <p>
                        <a href="#!" class="text-reset">Hướng dẫn mua hàng</a>
                    </p>
                    <p>
                        <a href="#!" class="text-reset">Bài viết & tin tức</a>
                    </p>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold mb-4">
                        SẢN PHẨM BÁN CHẠY
                    </h6>
                    <p>
                        <a href="#!" class="text-reset">Mua Spotify Premium</a>
                    </p>
                    <p>
                        <a href="#!" class="text-reset">Mua tài khoản Netflix</a>
                    </p>
                    <p>
                        <a href="#!" class="text-reset">Mua Canva Pro</a>
                    </p>
                    <p>
                        <a href="#!" class="text-reset">Adobe All Apps</a>
                    </p>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
                    <p><i class="fas fa-home me-3"></i> New York, NY 10012, US</p>
                    <p>
                        <i class="fas fa-envelope me-3"></i>
                        info@example.com
                    </p>
                    <p><i class="fas fa-phone me-3"></i> + 01 234 567 88</p>
                    <p><i class="fas fa-print me-3"></i> + 01 234 567 89</p>
                </div>
                <!-- Grid column -->
            </div>
            <!-- Grid row -->
        </div>
    </section>
    <!-- Section: Links  -->

    <!-- Copyright -->
    <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
        Copyright © Gamikey. All Rights Reserved. Powered by
        <a class="text-reset fw-bold" href="discord.com">Chú Bé</a>
    </div>
    <!-- Copyright -->
</footer>
