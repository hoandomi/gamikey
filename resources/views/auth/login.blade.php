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
                            <div class="col-second auth_body_left col-6 order-2 py-2">
                                <div class="d-flex align-items-center justify-content-center h-100 w-100">
                                    <div class="auth_body_left_container">
                                        <h2>Đăng Nhập</h2>
                                        <h3>Đăng nhập với tài khoản mạng xã hội</h3>
                                        <div class="social_login">
                                            <a href="{{route('google.redirect')}}">
                                                <i class="fab fa-google"></i>
                                            </a>
                                            <a href="">
                                                <i class="fab fa-facebook"></i>
                                            </a>
                                            <a href="">
                                                <i class="fab fa-discord"></i>
                                            </a>
                                            <a href="{{route('github.redirect')}}">
                                                <i class="fab fa-github"></i>
                                            </a>
                                        </div>
                                        <form action="{{ route('login') }}" method="POST" class="form_auth">
                                            @csrf
                                            <div class="col-12 my-4">
                                                <div class="input-group">
                                                    <label for="email" class="input-group-text"><i
                                                            class="fas fa-user-circle fa-fw"></i></label>
                                                    <input id="email" type="email" name="email"
                                                        class="form-control" placeholder="Nhập Email"
                                                        value="{{ old('email') }}">
                                                </div>
                                                 @if ($errors->has('email'))
                                                        <code
                                                            class="text-danger mt-2">{{ $errors->first('email') }}</code>
                                                    @endif
                                            </div>
                                            <div class="col-12 my-3">
                                                <div class="input-group">
                                                    <label for="password" class="input-group-text"><i
                                                            class="fas fa-lock-alt fa-fw"></i></label>
                                                    <input id="password" name="password" type="password"
                                                        class="form-control passwordType" placeholder="Nhập Mật Khẩu">
                                                    <!-- SHOW HIDE PASSWORD -->
                                                    <span class="input-group-text show_hide_password"
                                                        id="basic-addon"><i id="eyeChangedIcon" class="fas fa-eye"></i></span>
                                                    @if ($errors->has('password'))
                                                        <code
                                                            class="text-danger mt-2">{{ $errors->first('password') }}</code>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-12 my-2">
                                                <!-- Remember Me -->
                                                <div class="block">
                                                    <label for="remember_me" class="inline-flex items-center">
                                                        <input id="remember_me" type="checkbox"
                                                            class="rounded form-check-input border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                                                            name="remember">
                                                        <span class="ms-2 text-sm text-white">Ghi Nhớ</span>
                                                    </label>
                                                </div>
                                            </div>
                                            <!-- BUTTON SUBMIT LOGIN -->
                                            <div class="col-12">
                                                <button type="submit" class="btn btn-primary create-btn">Đăng
                                                    Nhập</button>
                                            </div>
                                        </form>
                                        <!-- FORGET PASSWORD -->
                                        <div class="forget_password my-2">
                                            <a href="{{ route('password.request') }}">Quên mật khẩu?</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-first auth_body_right col-6 order-1">
                                <div class="auth_body_right_container d-flex justify-content-center">
                                    <div class="">
                                        <a href=""><img
                                                src="{{ asset('frontend/assets/images/Logo-Gamikey-1024x576.png.webp') }}"
                                                alt=""></a>
                                        <h2>GAMIKEY, Mua Key Là Rẻ</h2>
                                        <div class="desciption">Lần đầu tiên ở đây? Tạo tài khoản của bạn để mua sắm
                                            trên Muakey.com</div>
                                        <a href="{{route('register')}}" class="primary-btn create-btn">Tạo Tài Khoản</a>
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
