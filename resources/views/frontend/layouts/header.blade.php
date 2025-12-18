@php
    $categories = \App\Models\Category::where('status', 1)
        ->with([
            'subCategories' => function ($query) {
                $query->where('status', 1);
            },
        ])
        ->limit(8)
        ->get(['name', 'slug', 'id']);
    $brands = \App\Models\Brand::where('status', 1)->get(['name', 'slug', 'image']);
    $productsTopSearch = \App\Models\Product::where('status', 1)
        ->orderBy('search', 'desc')
        ->limit(8)
        ->get(['name', 'slug', 'image']);
@endphp



<!-- ************************* Header ************************* -->
<header id="header">
    <div class="header-wrapper">
        <!-- ************************* Header TOP ************************* -->
        <div class="container d-flex inner_header">
            <!-- ************************* Header LOGO ************************* -->
            <div class="col-3">
                <a href="{{ route('home') }}">
                    <img style="width: 150px; height: 100%; max-height: 84px;" loading="lazy"
                        src="{{ asset('frontend/assets/images/Logo-Gamikey-1024x576.png.webp') }}" alt="Logo Header">
                </a>
            </div>
            <!-- ************************* Header SEARCH FORM ************************* -->
            <div class="nav_header_search col-6 d-flex align-items-center pe-5">
                <div class="header_search">
                    <form action="{{ route('products.index') }}" method="get">
                        <div class="header_search_form">
                            <input id="searchproduct" type="text" name="search" placeholder="Tìm kiếm sản phẩm...">
                            <button type="submit" value="Tìm Kiếm" id="btnSeachProduct"><i
                                    class="fas fa-search"></i></button>
                        </div>
                    </form>
                    <!-- ************************* Header SEARCH ITEMS ************************* -->
                    <div class="header_search_items overflow-y-scroll">
                        <!-- ************************* Header SEARCH ITEMS ************************* -->

                    </div>
                </div>

            </div>
            <!-- ************************* Header BUTTON ACTIONS ************************* -->
            <div class="col-3 header_nav_actions d-flex align-items-center">
                <div class="col-12 header-nav-actions_items d-flex align-items-center">
                    <div class="col-6 header_btn_actions mx-2">
                        @if (Auth::check())
                            {{-- LOGIN USER --}}
                            <div class="header_btn_actions_items">
                                <div class="header_action_king">
                                    <button
                                        class="d-flex justify-content-center align-items-center header_actionBtn_king"
                                        type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <li class="me-3 header_action_king_icon"><i class="fas fa-user"></i></li>
                                        <li class="header_action_king_text"><span>Tài Khoản</span></li>
                                    </button>
                                    <li class="dropdown-menu">
                                        <ul class="header_action_queen_items">
                                            <div class="header_action_queen_item">
                                                <li>Xin Chào: {{ Auth::user()->name }}</li>
                                                <li><a href="{{ route('profile') }}">Tài Khoản</a></li>
                                                <li><a href="{{ route('profile-cart-history') }}">Đơn Hàng</a></li>
                                                <form method="POST" action="{{ route('logout') }}">
                                                    @csrf
                                                    <li><a href="{{ route('logout') }}"
                                                            onclick="event.preventDefault();
                                                            this.closest('form').submit();">Đăng
                                                            Xuất</a></li>
                                                </form>
                                            </div>
                                        </ul>
                                    </li>
                                </div>
                            </div>
                        @else
                            {{-- GUEST --}}
                            <a class="header_btn_actions_items" href="{{ route('login') }}">
                                <ul class="header_action_king">
                                    <button
                                        class="d-flex justify-content-center align-items-center header_actionBtn_king loginBtn">
                                        <li class="me-3 header_action_king_icon"><i class="fas fa-user"></i></li>
                                        <li class="header_action_king_text"><span>Đăng Nhập</span></li>
                                    </button>
                                </ul>
                            </a>
                        @endif
                    </div>
                    <div class="col-6 header_btn_actions mx-2">
                        <div id="view_mini_cart" class="header_btn_actions_items">
                            <ul class="header_action_king">
                                <li class="me-3 header_action_king_icon"><i class="fas fa-shopping-basket"></i></li>
                                <li class="header_action_king_text"><span>Giỏ Hàng</span></li>
                                @if (Cart::count() > 0)
                                    <li class="header_qty_cart">{{ Cart::count() }}</li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ************************* Header BOTTOM ************************* -->
        <div class="container d-flex bottom_header">
            <div class="header-bottom-nav">
                <ul class="header_vertical_menu_items d-flex align-items-center">
                    <li class="header_vertical_menu_item">
                        <div class="header_vertical_menu_dropdown dropdown">
                            <button class="btn btn-secondary dropdown-toggle header_vertical_menu_button" type="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-bars"></i>
                                <p>Danh Mục</p>
                            </button>
                            <ul class="dropdown-menu">
                                <div class="col-12 d-flex p-4">
                                    <div class="col-5 header-menu-categories">
                                        <div class="col-12 menu-title">
                                            <div class="col-12">
                                                <h2>Danh Mục</h2>
                                            </div>
                                        </div>
                                        <div class="menu-list">
                                            <div class="col-12 flex-wrap d-flex">
                                                @foreach ($categories as $category)
                                                    <div class="col-6">
                                                        <a
                                                            href="{{ route('products.index', ['category' => $category->slug]) }}">{{ $category->name }}</a>
                                                    </div>
                                                    @foreach ($category->subCategories as $subCategory)
                                                        <div class="col-6">
                                                            <a
                                                                href="{{ route('products.index', ['subCategory' => $subCategory->slug]) }}">{{ $subCategory->name }}</a>
                                                        </div>
                                                    @endforeach
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="line-separation my-3"></div>
                                        </div>
                                        <div class="col-12 menu-type d-flex flex-wrap">
                                            <div class="col-lg-3 col-4 my-lg-0 my-3"><a
                                                    href="{{ route('products.index', ['type' => 'nang-cap']) }}"
                                                    class="btn btn-outline-orange">Nâng
                                                    Cấp</a></div>
                                            <div class="col-lg-3 col-4 m-3 m-lg-0 mx-lg-3"><a
                                                    href="{{ route('products.index', ['type' => 'tai-khoan']) }}"
                                                    class="btn btn-outline-orange">Tài
                                                    Khoản</a></div>
                                            <div class="col-lg-3 col-4"><a
                                                    href="{{ route('products.index', ['type' => 'key']) }}"
                                                    class="btn btn-outline-orange">Key Active
                                                </a></div>
                                        </div>
                                    </div>
                                    <div class="col-4 px-3 header-menu-brand">
                                        <div class="col-12 menu-title">
                                            <div class="col-12">
                                                <h2>Thương Hiệu</h2>
                                            </div>
                                        </div>
                                        <div class="menu-list">
                                            <div class="row">
                                                @foreach ($brands as $brand)
                                                    <div class="col-6">
                                                        <a
                                                            href="{{ route('products.index', ['brand' => $brand->slug]) }}"><img
                                                                loading="lazy" src="{{ asset($brand->image) }}"
                                                                alt="">
                                                            {{ $brand->name }}</a>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-3 px-3 header-menu-best-search">
                                        <div class="col-12 menu-title">
                                            <div class="col-12">
                                                <h2>Tìm Kiếm Nhiều Nhất</h2>
                                            </div>
                                        </div>

                                        <div class="menu-list">
                                            @foreach ($productsTopSearch as $productTopSearch)
                                                <div class="col-12">
                                                    <a href="{{ route('products.show', $productTopSearch->slug) }}"><img
                                                            src="{{ asset($productTopSearch->image) }}"
                                                            alt=""> {!! limitText($productTopSearch->name, 35) !!}</a>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                            </ul>
                        </div>
                    </li>

                    @foreach ($brands as $brand)
                        <li
                            class="header_vertical_menu_item header_vertical_menu_item_brand mx-4 {{ request()->brand == $brand->slug ? 'active' : '' }}">
                            <a href="{{ route('products.index', ['brand' => $brand->slug]) }}">
                                <img loading="lazy" src="{{ asset($brand->image) }}" alt="Adobe">
                                <h5 class="header_vertical_menu_brand_title">{{ $brand->name }}</h5>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</header>
<!-- ************************* Header MOBILE ************************* -->
<header-mobile id="header-mobile">
    <div class="header-wrapper">
        <div class="d-flex inner_header_mobile py-4">
            <div class="col-2 sidebar_mobile d-flex justify-content-center align-items-center">
                <div class="sidebar_action">
                    <div class="sidebar_action_button" id="sidebar_action_button">
                        <i class="fas fa-bars"></i>
                    </div>
                </div>
            </div>
            <!-- ************************* Header SEARCH FORM ************************* -->
            <div class="nav_header_search col-8 d-flex align-items-center pe-3">
                <div class="header_search">
                    <form action="{{ route('products.index') }}" method="get">
                        <div class="header_search_form">
                            <input id="searchproduct" type="text" name="search"
                                placeholder="Tìm kiếm sản phẩm...">
                            <button type="submit" value="Tìm Kiếm" id="btnSeachProduct"><i
                                    class="fas fa-search"></i></button>
                        </div>
                    </form>
                    <!-- ************************* Header SEARCH ITEMS ************************* -->
                    <div class="header_search_items overflow-y-scroll">
                        <!-- ************************* Header SEARCH ITEMS ************************* -->

                    </div>
                </div>
            </div>
            <div class="col-2 logo_mobile">
                <a href="">
                    <img style="width: 100%; height: 100%; max-height: 84px;" loading="lazy"
                        src="{{ asset('frontend/assets/images/Logo-Gamikey-1024x576.png.webp') }}" alt="Logo Header">
                </a>
            </div>
        </div>
    </div>
</header-mobile>
