<header class="app-header">

    <!-- Start::main-header-container -->
    <div class="main-header-container container-fluid">

        <!-- Start::header-content-left -->
        <div class="header-content-left">

            <!-- Start::header-element -->
            <div class="header-element">
                <div class="horizontal-logo">
                    <a href="index.html" class="header-logo">
                        <img src="{{ asset('backend/assets/images/brand-logos/desktop-logo.png') }}" alt="logo"
                            class="desktop-logo">
                        <img src="{{ asset('backend/assets/images/brand-logos/toggle-logo.png') }}" alt="logo"
                            class="toggle-logo">
                        <img src="{{ asset('backend/assets/images/brand-logos/desktop-dark.png') }}" alt="logo"
                            class="desktop-dark">
                        <img src="{{ asset('backend/assets/images/brand-logos/toggle-dark.png') }}" alt="logo"
                            class="toggle-dark">
                        <img src="{{ asset('backend/assets/images/brand-logos/desktop-white.png') }}" alt="logo"
                            class="desktop-white">
                        <img src="{{ asset('backend/assets/images/brand-logos/toggle-white.png') }}" alt="logo"
                            class="toggle-white">
                    </a>
                </div>
            </div>
            <!-- End::header-element -->

            <!-- Start::header-element -->
            <div class="header-element">
                <!-- Start::header-link -->
                <a aria-label="Hide Sidebar"
                    class="sidemenu-toggle header-link animated-arrow hor-toggle horizontal-navtoggle"
                    data-bs-toggle="sidebar" href="javascript:void(0);"><span></span></a>
                <!-- End::header-link -->
            </div>
            <!-- End::header-element -->

            <!-- Start::header-element -->
            <div class="main-header-center  d-none d-lg-block header-link">
                <input type="text" class="form-control" id="typehead" placeholder="Search for results..."
                    autocomplete="off">
                <button type="button" aria-label="button" class="btn pe-1"><i class="fe fe-search"
                        aria-hidden="true"></i></button>
                <div id="headersearch" class="header-search">
                    <div class="p-3">
                        <div class="">
                            <p class="fw-semibold text-muted mb-2 fs-13">Recent Searches</p>
                            <div class="ps-0">
                                <a href="javascript:void(0)" class="search-tags"><i
                                        class="fe fe-search me-2"></i>People<span></span></a>
                                <a href="javascript:void(0)" class="search-tags"><i
                                        class="fe fe-search me-2"></i>Pages<span></span></a>
                                <a href="javascript:void(0)" class="search-tags"><i
                                        class="fe fe-search me-2"></i>Articles<span></span></a>
                            </div>
                        </div>
                        <div class="mt-3">
                            <p class="fw-semibold text-muted mb-3 fs-13">Apps and pages</p>
                            <ul class="ps-0">
                                <li class="p-1 d-flex align-items-center text-muted mb-3 search-app">
                                    <a class="d-inline-flex align-items-center" href="full-calendar.html"><i
                                            class="fe fe-calendar me-2 fs-14 bg-primary-transparent p-2 rounded-circle"></i><span>Calendar</span></a>
                                </li>
                                <li class="p-1 d-flex align-items-center text-muted mb-3 search-app">
                                    <a class="d-inline-flex align-items-center" href="mail.html"><i
                                            class="fe fe-mail me-2 fs-14 bg-primary-transparent p-2 rounded-circle"></i><span>Mail</span></a>
                                </li>
                                <li class="p-1 d-flex align-items-center text-muted mb-3 search-app">
                                    <a class="d-inline-flex align-items-center" href="buttons.html"><i
                                            class="fe fe-globe me-2 fs-14 bg-primary-transparent p-2 rounded-circle"></i><span>Buttons</span></a>
                                </li>
                            </ul>
                        </div>
                        <div class="mt-3">
                            <p class="fw-semibold text-muted mb-2 fs-13">Links</p>
                            <ul class="ps-0 list-unstyled mb-0">
                                <li class="p-1 align-items-center text-muted mb-1 search-app">
                                    <a href="javascript:void(0)"
                                        class="text-primary"><u>http://spruko/spruko.com</u></a>
                                </li>
                                <li class="p-1 align-items-center text-muted mb-0 pb-0 search-app">
                                    <a href="javascript:void(0)"
                                        class="text-primary"><u>http://spruko/spruko.com</u></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="py-3 border-top px-0">
                        <div class="text-center">
                            <a href="javascript:void(0)" class="text-primary text-decoration-underline fs-15">View
                                all</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End::header-element -->

        </div>
        <!-- End::header-content-left -->

        <!-- Start::header-content-right -->
        <div class="header-content-right">
            <!-- Start::header-element -->
            <div class="header-element header-search d-lg-none d-block">
                <!-- Start::header-link -->
                <a aria-label="anchor" href="javascript:void(0);" class="header-link" data-bs-toggle="modal"
                    data-bs-target="#searchModal">
                    <i class="fe fe-search header-link-icon"></i>
                </a>
                <!-- End::header-link -->
            </div>
            <!-- End::header-element -->

            <!-- Start::header-element -->
            <div class="header-element country-selector">
                <!-- Start::header-link|dropdown-toggle -->
                <a href="javascript:void(0);" class="header-link dropdown-toggle" data-bs-auto-close="outside"
                    data-bs-toggle="dropdown">
                    <img src="{{ asset('backend/assets/images/flags/us_flag.jpg') }}" alt="img"
                        class="rounded-circle">
                </a>
                <!-- End::header-link|dropdown-toggle -->
                <ul class="main-header-dropdown dropdown-menu dropdown-menu-end" data-popper-placement="none">
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="javascript:void(0);">
                            <span class="avatar avatar-xs lh-1 me-2">
                                <img src="{{ asset('backend/assets/images/flags/us_flag.jpg') }}" alt="img">
                            </span>
                            English
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="javascript:void(0);">
                            <span class="avatar avatar-xs lh-1 me-2">
                                <img src="{{ asset('backend/assets/images/flags/spain_flag.jpg') }}" alt="img">
                            </span>
                            Spanish
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="javascript:void(0);">
                            <span class="avatar avatar-xs lh-1 me-2">
                                <img src="{{ asset('backend/assets/images/flags/french_flag.jpg') }}" alt="img">
                            </span>
                            French
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="javascript:void(0);">
                            <span class="avatar avatar-xs lh-1 me-2">
                                <img src="{{ asset('backend/assets/images/flags/germany_flag.jpg') }}"
                                    alt="img">
                            </span>
                            German
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="javascript:void(0);">
                            <span class="avatar avatar-xs lh-1 me-2">
                                <img src="{{ asset('backend/assets/images/flags/italy_flag.jpg') }}" alt="img">
                            </span>
                            Italian
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="javascript:void(0);">
                            <span class="avatar avatar-xs lh-1 me-2">
                                <img src="{{ asset('backend/assets/images/flags/russia_flag.jpg') }}" alt="img">
                            </span>
                            Russian
                        </a>
                    </li>
                </ul>
            </div>
            <!-- End::header-element -->

            <!-- Start::header-element -->
            <div class="header-element header-theme-mode">
                <!-- Start::header-link|layout-setting -->
                <a aria-label="anchor" href="javascript:void(0);" class="header-link layout-setting">
                    <span class="light-layout">
                        <!-- Start::header-link-icon -->
                        <i class="fe fe-moon header-link-icon"></i>
                        <!-- End::header-link-icon -->
                    </span>
                    <span class="dark-layout">
                        <!-- Start::header-link-icon -->
                        <i class="fe fe-sun header-link-icon"></i>
                        <!-- End::header-link-icon -->
                    </span>
                </a>
                <!-- End::header-link|layout-setting -->
            </div>
            <!-- End::header-element -->

            <!-- Start::header-element -->
            <div class="header-element cart-dropdown">
                <!-- Start::header-link|dropdown-toggle -->
                <a href="javascript:void(0);" class="header-link dropdown-toggle" data-bs-auto-close="outside"
                    data-bs-toggle="dropdown">
                    <i class="fe fe-shopping-cart header-link-icon"></i>
                    <span class="badge bg-secondary rounded-pill header-icon-badge" id="cart-icon-badge">9+</span>
                </a>
                <!-- End::header-link|dropdown-toggle -->
                <!-- Start::main-header-dropdown -->
                <div class="main-header-dropdown dropdown-menu dropdown-menu-end" data-popper-placement="none">
                    <div class="p-3">
                        <div class="d-flex align-items-center justify-content-between">
                            <p class="mb-0 fs-16 fw-semibold">Đơn Hàng</p>
                            <span class="badge bg-danger-transparent fs-14" id="cart-data">Hurry Up!</span>
                        </div>
                    </div>
                    <div>
                        <hr class="dropdown-divider">
                    </div>
                    <ul class="list-unstyled mb-0" id="header-cart-items-scroll">
                        @php
                            // ? Get 4 order newest
                            $orders = \App\Models\Order::orderBy('id', 'desc')->take(4)->get();
                        @endphp
                        @foreach ($orders as $order)
                            <li class="dropdown-item">
                                <div class="d-flex align-items-start">
                                    <div class="pe-2">
                                        <span class="avatar avatar-md bg-pink avatar-rounded"><i
                                                class="fe fe-shopping-cart fs-18"></i></span>
                                    </div>
                                    <div class="flex-grow-1 d-flex align-items-center my-auto">
                                        <div>
                                            <p class="mb-0 fw-semibold"><a
                                                    href="{{ route('admin.order.show', $order->id) }}">#{{ $order->invoice_id }}</a>
                                            </p>
                                            <p class="mb-0 fw-semibold"><a
                                                    href="{{ route('admin.order.show', $order->id) }}">{{ $order->customer_name }}
                                                    đã mua hàng</a>
                                            </p>
                                            <p class="mb-0 fw-semibold text-success">
                                                {{ formatPrice($order->total_amount) }}</p>
                                            <span
                                                class="text-muted fw-normal fs-12 header-notification-text">{{ $order->created_at->diffForHumans() }}</span>
                                        </div>
                                        <div class="ms-auto my-auto">
                                            <a aria-label="anchor" href="javascript:void(0);"
                                                class="min-w-fit-content text-muted me-1 dropdown-item-close1"><i
                                                    class="ti ti-x fs-16"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                    <div class="p-3 empty-header-item1 border-top text-center">
                        <a href="{{ route('admin.order.index') }}" class="">Xem Tất Cả Đơn Hàng</a>
                    </div>
                </div>
                <!-- End::main-header-dropdown -->
            </div>
            <!-- End::header-element -->

            <!-- Start::header-element -->
            <div class="header-element message-dropdown">
                <!-- Start::header-link|dropdown-toggle -->
                <a aria-label="anchor" href="javascript:void(0);" class="header-link dropdown-toggle"
                    data-bs-toggle="dropdown" data-bs-auto-close="outside" id="messageDropdown2"
                    aria-expanded="false">
                    <i class="fe fe-message-square header-link-icon"></i>
                    <span class="w-9 h-9 p-0 bg-danger rounded-pill header-icon-badge pulse pulse-danger"
                        id="message-icon-badge"></span>
                </a>
                <!-- End::header-link|dropdown-toggle -->
                <!-- Start::main-header-dropdown -->
                <div class="main-header-dropdown dropdown-menu dropdown-menu-end" data-popper-placement="none">
                    <div class="p-3">
                        <div class="d-flex align-items-center justify-content-between">
                            <p class="mb-0 fs-17 fw-semibold">Tin Nhắn</p>
                            <span class="badge bg-secondary-transparent" id="message-data">5 Unread</span>
                        </div>
                    </div>
                    <div class="dropdown-divider"></div>
                    <ul class="list-unstyled mb-0" id="header-message-scroll">
                        @php
                            $comments = \App\Models\ProductComment::with('user')->orderBy('id', 'desc')->take(4)->get();
                        @endphp
                        @foreach ($comments as $comment)
                            <li class="dropdown-item">
                                <div class="d-flex align-items-start">
                                    <div class="pe-2">
                                        <img src="{{ asset($comment->user->image) }}" alt="img"
                                            class="avatar avatar-md avatar-rounded">
                                    </div>
                                    <div class="w-100">
                                        <div class="flex-grow-1 d-flex align-items-centermy-auto">
                                            <div>
                                                <h6 class="mb-0 fw-semibold fs-14"><a
                                                        href="chat.html">{{ $comment->user->name }}</a></h6>
                                            </div>
                                            <div class="ms-auto text-end">
                                                <p class="text-muted mb-0">
                                                    {{ $comment->created_at->diffForHumans() }}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 d-flex align-items-centermy-auto">
                                            <div>
                                                <span
                                                    class="text-muted fw-normal fs-12">{{ limitText($comment->comment) }}</span>
                                            </div>
                                            <div class="ms-auto text-end">
                                                <a aria-label="anchor" href="javascript:void(0);"
                                                    class="min-w-fit-content text-muted me-1 dropdown-item-close2"><i
                                                        class="ti ti-x fs-16"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                    <div class="p-3 empty-header-item2 border-top text-center">
                        <a href="{{ route('admin.comment.index') }}" class="">Xem Tất Cả Bình Luận</a>
                    </div>
                    <div class="p-5 empty-item2 d-none">
                        <div class="text-center">
                            <span class="avatar avatar-xl avatar-rounded bg-danger-transparent">
                                <i class="ri-message-2-line fs-2"></i>
                            </span>
                            <h6 class="fw-semibold mt-3">No New Messages</h6>
                        </div>
                    </div>
                </div>
                <!-- End::main-header-dropdown -->
            </div>
            <!-- End::header-element -->

            <!-- Start::header-element -->
            <div class="header-element header-fullscreen">
                <!-- Start::header-link -->
                <a aria-label="anchor" onclick="openFullscreen();" href="#" class="header-link">
                    <i class="fe fe-minimize full-screen-open header-link-icon"></i>
                    <i class="fe fe-minimize-2 full-screen-close header-link-icon d-none"></i>
                </a>
                <!-- End::header-link -->
            </div>
            <!-- End::header-element -->

            <!-- Start::header-element -->
            <div class="header-element">
                <!-- Start::header-link|dropdown-toggle -->
                <a aria-label="anchor" href="javascript:void(0);" class="header-link dropdown-toggle"
                    data-bs-toggle="offcanvas" data-bs-target="#sidebar-right">
                    <i class="fe fe-align-right header-link-icon"></i>
                </a>
                <!-- End::header-link|dropdown-toggle -->
            </div>
            <!-- End::header-element -->

            <!-- Start::header-element -->
            <div class="header-element main-profile-user">
                <!-- Start::header-link|dropdown-toggle -->
                <a href="#" class="header-link dropdown-toggle" id="mainHeaderProfile"
                    data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                    <div class="d-flex align-items-center">
                        <div class="me-xxl-2 me-0">
                            <img src="{{ asset(Auth::user()->image) }}" alt="img" width="32"
                                height="32" class="rounded-circle">
                        </div>
                        <div class="d-xxl-block d-none my-auto">
                            <h6 class="fw-semibold mb-0 lh-1 fs-14">{{ Auth::user()->name }}</h6>
                            <span
                                class="op-7 fw-normal d-block fs-11 text-muted">{{ Str::upper(Auth::user()->role) }}</span>
                        </div>
                    </div>
                </a>
                <!-- End::header-link|dropdown-toggle -->
                <ul class="main-header-dropdown dropdown-menu pt-0 header-profile-dropdown dropdown-menu-end"
                    aria-labelledby="mainHeaderProfile">
                    <li class="drop-heading d-xxl-none d-block">
                        <div class="text-center">
                            <h5 class="text-dark mb-0 fs-14 fw-semibold">Json Taylor</h5>
                            <small class="text-muted">Web Designer</small>
                        </div>
                    </li>
                    <li class="dropdown-item"><a class="d-flex w-100"
                            href="{{ route('admin.user.edit', Auth::user()->id) }}"><i
                                class="fe fe-user fs-18 me-2 text-primary"></i>Profile</a></li>
                    <li class="dropdown-item"><a class="d-flex w-100"
                            href="{{ route('admin.payment-setting.index') }}"><i
                                class="fe fe-settings fs-18 me-2 text-primary"></i>Cài Đặt</a></li>
                    <li class="dropdown-item"><a class="d-flex w-100" href="chat.html"><i
                                class="fe fe-headphones fs-18 me-2 text-primary"></i>Support</a></li>
                    <li class="dropdown-item"><a class="d-flex w-100" href="lockscreen.html"><i
                                class="fe fe-lock fs-18 me-2 text-primary"></i>Lockscreen</a></li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <li class="dropdown-item"><a class="d-flex w-100" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                            this.closest('form').submit();"><i
                                    class="fe fe-info fs-18 me-2 text-primary"></i>Log Out</a></li>
                    </form>
                </ul>
            </div>
            <!-- End::header-element -->

            <!-- Start::header-element -->
            <div class="header-element">
                <!-- Start::header-link|switcher-icon -->
                <a aria-label="anchor" href="#" class="header-link switcher-icon" data-bs-toggle="offcanvas"
                    data-bs-target="#switcher-canvas">
                    <i class="bx bx-cog header-link-icon"></i>
                </a>
                <!-- End::header-link|switcher-icon -->
            </div>
            <!-- End::header-element -->

        </div>
        <!-- End::header-content-right -->

    </div>
    <!-- End::main-header-container -->

</header>
