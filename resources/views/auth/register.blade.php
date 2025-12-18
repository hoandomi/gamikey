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
                            <div class="col-second auth_body_left col-6 order-2 py-5">
                                <div class="d-flex align-items-center justify-content-center h-100 w-100">
                                    <div class="auth_body_left_container">
                                        <h2>Đăng Ký</h2>
                                        <h3>Đăng nhập với tài khoản mạng xã hội</h3>
                                        <div class="social_login">
                                            <a href="">
                                                <i class="fab fa-google"></i>
                                            </a>
                                            <a href="">
                                                <i class="fab fa-facebook"></i>
                                            </a>
                                            <a href="">
                                                <i class="fab fa-discord"></i>
                                            </a>
                                            <a href="">
                                                <i class="fab fa-steam"></i>
                                            </a>
                                        </div>
                                        <form method="POST" action="{{ route('register') }}" class="form_auth">
                                            @csrf
                                            <!-- Name Address -->
                                            <div class="col-12 my-4">
                                                <h3 class="mb-3">Đăng ký bằng email để nhận được email xác minh.</h3>
                                                <div class="input-group">
                                                    <label for="name" class="input-group-text"><i
                                                            class="fas fa-envelope fa-fw"></i></label>
                                                    <input id="name" name="name" type="text"
                                                        class="form-control" placeholder="Nhập Họ Và Tên" value="{{old('name')}}">
                                                </div>
                                                @if ($errors->has('name'))
                                                    <code class="text-danger mt-2">{{ $errors->first('name') }}</code>
                                                @endif
                                            </div>
                                            <!-- Email Address -->
                                            <div class="col-12 my-4">
                                                <div class="input-group">
                                                    <label for="email" class="input-group-text"><i
                                                            class="fas fa-envelope fa-fw"></i></label>
                                                    <input id="email" name="email" type="text" inputmode="email"
                                                        class="form-control" placeholder="Nhập Email" value="{{old('email')}}">
                                                </div>
                                                @if ($errors->has('email'))
                                                    <code class="text-danger mt-2">{{ $errors->first('email') }}</code>
                                                @endif
                                            </div>
                                            <!-- Password -->
                                            <div class="col-12 my-4">
                                                <div class="input-group">
                                                    <label for="password" class="input-group-text"><i
                                                            class="fas fa-lock"></i></label>
                                                    <input id="password" name="password" type="password"
                                                        class="form-control" placeholder="Nhập Mật Khẩu">
                                                </div>
                                                @if ($errors->has('password'))
                                                    <code
                                                        class="text-danger mt-2">{{ $errors->first('password') }}</code>
                                                @endif
                                            </div>
                                            <!-- Confirm Password -->
                                            <div class="col-12 my-4">
                                                <div class="input-group">
                                                    <label for="password_confirmation" class="input-group-text"><i
                                                            class="fas fa-lock"></i></i></label>
                                                    <input id="password_confirmation" name="password_confirmation"
                                                        type="password" class="form-control"
                                                        placeholder="Nhập Lại Mật Khẩu">
                                                </div>
                                                @if ($errors->has('password_confirmation'))
                                                    <code
                                                        class="text-danger mt-2">{{ $errors->first('password_confirmation') }}</code>
                                                @endif
                                            </div>
                                            <!-- BUTTON SUBMIT LOGIN -->
                                            <div class="col-12">
                                                <button class="btn btn-primary create-btn">Đăng Ký</button>
                                            </div>
                                        </form>
                                        <!-- FORGET PASSWORD -->
                                        <div class="forget_password my-2">
                                            <a href="">Quay trở lại trang chủ</a>
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
                                                    <p class="active">1</p>
                                                    <span>Đăng ký bằng email để nhận được email xác minh.</span>
                                                </div>
                                                <div class="step_to_regis_item d-flex">
                                                    <p>2</p>
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
