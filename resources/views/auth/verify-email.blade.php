<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gamikey - Tài khoản bản quyền giá rẻ</title>
    <link rel="icon" href="{{ asset('frontend/assets/images/cropped-Gamikey-logo-512-32x32.png') }}" sizes="32x32">
    <link rel="icon" href="{{ asset('frontend/assets/images/cropped-Gamikey-logo-512-192x192.png') }}" sizes="192x192">
    <link rel="apple-touch-icon" href="{{ asset('frontend/assets/images/cropped-Gamikey-logo-512-180x180.png') }}">
    <!-- GOOGLE FONT -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <!-- CSS Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- CSS Font Awesome -->
    <link href="https://cdn.jsdelivr.net/gh/hung1001/font-awesome-pro@4cac1a6/css/all.css" rel="stylesheet"
        type="text/css" />
    <!-- CSS SWIPPER -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <!-- CSS CAROUSEL -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
        integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- CSS Style -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/jquery-sakura.min.css') }}">
    <!-- SAKURA Style -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/sakura.min.css') }}">
    <!-- CSS Style -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css') }}">
    <style>
        input::placeholder {
            color: #ffffff99 !important;
        }
    </style>
</head>

<body>
    <main id="authForm">
        <div class="auth_layout">
            <div class="container authForm_container h-100">
                <div class="d-flex align-items-center justify-content-center h-100 col-10">
                    <div class="auth_body">
                        <div class="auth_body_container row">
                            <div class="col-second auth_body_left col-6 order-2">
                                <div class="d-flex align-items-center justify-content-center h-100 w-100">
                                    <div class="auth_body_left_container">
                                        @if (session('status') == 'verification-link-sent')
                                            <div class="mb-4 font-medium text-sm text-green-600">
                                                {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                                            </div>
                                        @endif

                                        <div class="col-12 my-4">
                                            <div class="input-group">
                                                <label for="username" class="input-group-text"><i
                                                        class="fas fa-envelope fa-fw"></i></label>
                                                <input id="username" type="text" class="form-control"
                                                    placeholder="Nhập Email" value="{{ session('email') }}" disabled>
                                            </div>
                                            <h3>Click vào link ở email xác nhận để hoàn thành quá trình. Vui lòng
                                                kiểm tra <strong style="color: white">THƯ RÁC</strong> hoặc <strong
                                                    style="color: white">SPAM</strong> nếu bạn không tìm thấy ở
                                                <strong style="color: white">HỘP THƯ ĐẾN</strong>.
                                            </h3>
                                        </div>
                                        <!-- BUTTON SUBMIT LOGIN -->
                                        <div class="col-12 d-flex">
                                            <div class="col-6">
                                                <a href="https://mail.google.com/mail/u/0/#inbox"
                                                    class="btn btn-primary create-btn p-3">Kiểm Tra Email</a>
                                            </div>
                                            <div class="col-6">
                                                <form method="POST" action="{{ route('verification.send') }}">
                                                    @csrf

                                                    <div>
                                                        <button class="btn btn-primary create-btn p-3">
                                                            {{ __('Resend Verification Email') }}
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <!-- FORGET PASSWORD -->
                                        <div class="forget_password my-2">
                                            <a href="index.html">Quay trở lại trang chủ</a>
                                            <br>
                                            <form method="POST" action="{{ route('logout') }}">
                                                @csrf

                                                <a href="{{ route('logout') }}"
                                                    onclick="event.preventDefault();
                                                            this.closest('form').submit();">
                                                    {{ __('Log Out') }}
                                                </a>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-first auth_body_right regis col-6 order-1">
                                <div class="auth_body_right_container d-flex justify-content-center">
                                    <div class="">
                                        <h2>4 bước để trở thành thành viên của gamikey</h2>
                                        <div class="step_to_regis">
                                            <div class="step_to_regis_container">
                                                <div class="step_to_regis_item d-flex">
                                                    <p>1</p>
                                                    <span>Đăng ký bằng email để nhận được email xác minh.</span>
                                                </div>
                                                <div class="step_to_regis_item d-flex">
                                                    <p class="active">2</p>
                                                    <span>Nhấp vào liên kết xác minh trong email đã đăng ký.</span>
                                                </div>
                                                <div class="step_to_regis_item d-flex">
                                                    <p>3</p>
                                                    <span>Hoàn thành biểu mẫu đăng ký.</span>
                                                </div>
                                                <div class="step_to_regis_item d-flex">
                                                    <p>4</p>
                                                    <span>Bạn đã sẵn sàng, hãy bắt đầu tận hưởng mua sắm trong
                                                        Gamikey</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="auth_footer"></div>
                </div>
            </div>
        </div>
    </main>

    <!-- JS JQUERY -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <!-- JS JQUERY UI -->
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"
        integrity="sha256-lSjKY0/srUM9BE3dPm+c4fBo1dky2v27Gdjm2uoZaL0=" crossorigin="anonymous"></script>
    <!-- JS jqueryui-touch-punch -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js"></script>
    <!-- JS SAKURA -->
    <script src="{{ asset('frontend/assets/js/sakura.min.js') }}"></script>
    <!-- JS MAIN -->
    <script src="{{ asset('frontend/assets/js/script.js') }}"></script>
    <script>
        var sakura = new Sakura('body');
    </script>
</body>

</html>
