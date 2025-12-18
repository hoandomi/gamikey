@extends('frontend.layouts.master')

@section('content')
    <main class="product_cat">
        <!-- ************************* SHOPPING PAGE TITLE CATEGORIES ************************* -->
        <section class="category-page-title"
            style="background-image: url({{ asset('frontend/assets/images/windows-11-laptop.jpeg.webp') }})">
            <div class="category-page-title_container py-4">
                <div class="category-page-title_image">
                    <div class="background_image">
                    </div>
                </div>
            </div>
            <div class="category-page-title_text container d-flex">
                <div class="col-12 category-page-title_text_items d-md-flex align-items-center">
                    <div class="col-md-6 category-page-title_text_items_left">
                        <div class="col-12 title_cat_item">
                            <h2 class="title_cat text-center text-md-start">{{ $nameSlug }}</h2>
                        </div>
                        <div class="col-12 breadcrumbtitle">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb  d-flex justify-content-md-start justify-content-center">
                                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                    <li class="breadcrumb-item active"><a href="#">{{ $nameSlug }}</a></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="col-md-6 category-page-title_text_items_right d-md-flex justify-content-md-end">
                        <div class="col-12 d-md-flex justify-content-md-end">
                            <div class="col-md-6 filterMobile" id="filterMobile"><i class="far fa-tasks-alt fa-fw"></i>Lọc
                            </div>
                            <div class="col-md-6 formFilterCate">
                                <form action="{{ url()->current() }}" method="get" class="formSort">
                                    @foreach (request()->query() as $key => $value)
                                        {{-- REQUEST SORT != NULL --}}
                                        @if ($key != 'sort')
                                            <input type="hidden" name="{{ $key }}" value="{{ $value }}" />
                                        @endif
                                    @endforeach
                                    <select class="form-select selectSort" name="sort"
                                        aria-label="Default select example">
                                        <option {{ request()->sort == 'new' ? 'selected' : '' }} value="new">Mới Nhất
                                        </option>
                                        <option {{ request()->sort == 'old' ? 'selected' : '' }} value="old">Cũ Nhất
                                        </option>
                                        <option {{ request()->sort == 'asc' ? 'selected' : '' }} value="asc">Giá từ thấp
                                            tới cao</option>
                                        <option {{ request()->sort == 'desc' ? 'selected' : '' }} value="desc">Giá từ cao
                                            tới thấp</option>
                                    </select>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ************************* SHOPPING PAGE ITEMS ************************* -->
        <section class="section-product-page my-5">
            <div class="col-12 section-product__items d-md-flex container">
                <div class="col-md-3 col-12 section-product__items_left mobile">
                    <div class="section-product__items_left_items">
                        <div class="accordion categories_product_items" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        <h2 class="categories_product_title">Danh Mục Sản Phẩm</h2>
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="col-12 categories_list_items">
                                            <ul class="categories_list">
                                                @foreach ($categories as $category)
                                                    <li class="category_list d-flex justify-content-between"><a
                                                            href="{{ route('products.index', ['category' => $category->slug]) }}">{{ $category->name }}</a>
                                                        <span>{{ $category->products_count }}</span>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 d-md-block d-flex">
                            <div class="filter_categories_product_items col-md-12 col-6 my-4">
                                <div class="filter_categories__items">
                                    <!-- Price Range -->
                                    <div class="box shadow">
                                        <h2 class="categories_product_title">Lọc Theo Giá</h2>
                                        <form action="{{ url()->current() }}">
                                            @foreach (request()->query() as $key => $value)
                                                @if ($key != 'startRangePrice' && $key != 'endRangePrice')
                                                    <input type="hidden" name="{{ $key }}"
                                                        value="{{ $value }}" />
                                                @endif
                                            @endforeach
                                            <div class="values">
                                                <div><span id="first"></span> VNĐ</div> - <div><span
                                                        id="second"></span>
                                                    VNĐ
                                                </div>
                                            </div>
                                            <small>
                                                Khoảng Giá:
                                                <div><span id="third"></span>VNĐ</div>
                                            </small>
                                            <input type="hidden" name="startRangePrice" id="startRangePrice"
                                                value="0">
                                            <input type="hidden" name="endRangePrice" id="endRangePrice"
                                                value="2000000">
                                            <div class="slider" id="sliderrange" data-value-0="#first"
                                                data-value-1="#second" data-range="#third">
                                            </div>
                                            <button type="submit" class="btnFilterRange">Lọc</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="rate_categories_product_items col-md-12 col-6 my-4 shadow-lg">
                                <h2 class="categories_product_title">Danh Mục Sản Phẩm</h2>
                                <div class="rate_categories_product_container d-flex justify-content-between">
                                    <form action="" method="get">
                                        <div class="rate_categories_product_stars d-flex">
                                            <i class="fas fa-star" style="color: #FFD43B;"></i>
                                            <i class="fas fa-star" style="color: #FFD43B;"></i>
                                            <i class="fas fa-star" style="color: #FFD43B;"></i>
                                            <i class="fas fa-star" style="color: #FFD43B;"></i>
                                            <i class="far fa-star" style="color: #FFD43B;"></i>
                                        </div>
                                    </form>
                                    <div class="rate_categories_product_count">
                                        <span>(44)</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="new_product_items col-12 my-4 shadow-lg">
                            <h2 class="categories_product_title">Sản Phẩm Mới</h2>
                            <div class="new_product_items_container">
                                @foreach ($newProducts as $newProduct)
                                    <div class="product_new_item">
                                        <a href="{{ route('products.show', $newProduct->slug) }}"
                                            class="product_new_anchor d-flex">
                                            <div class="col-4 product_new_img_content">
                                                <img class="product_new_img" loading="lazy"
                                                    src="{{ asset($newProduct->image) }}" alt="">
                                            </div>
                                            <div class="col-8 product_new_text ms-xxl-1 ms-xl-2 ms-lg-3 ps-md-3">
                                                <div class="col-12 product_new_name_container">
                                                    <h3 class="product_new_name">{!! $newProduct->name !!}
                                                    </h3>
                                                </div>
                                                <div class="col-12 product_new_price_container">
                                                    <p class="product_new_price">{!! $newProduct->price !!}</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-9 col-12 section-product__items_right">
                    <div class="section-product-items row">
                        @if (count($products) > 0)
                            @foreach ($products as $product)
                                <div class="section-product-item col-xl-4 col-sm-6 col-md-4 col-6">
                                    <a href="{{ route('products.show', $product->slug) }}"
                                        class="section-product-anchor">
                                        <div class="col-12 d-xl-flex border shadow-lg">
                                            <div class="col-xl-6 section-product-left">
                                                <img height="180px;" loading="lazy" class="section-product-img"
                                                    src="{{ asset($product->image) }}" alt="">
                                            </div>
                                            <div class="col-xl-6 section-product-right p-2">
                                                <div class="col-12 section-product-name">
                                                    <h3 class="product_name">{!! $product->name !!}</h3>
                                                </div>
                                                <div class="col-12 section-product-middle d-flex py-2 align-items-center">
                                                    <div
                                                        class="col-6 section-product-categories d-flex align-items-center">
                                                        <p>{!! $product->category->name !!}</p>
                                                    </div>
                                                    <div class="col-6 section-product-price d-flex justify-content-end">
                                                        <i class="fas fa-shopping-cart fa-fw"></i>
                                                        <h4 class="product_qty_purchared">{{ $product->purchased }}</h4>
                                                    </div>
                                                    <div class="line-separation"></div>
                                                </div>
                                                <div class="col-12">
                                                    <h4 class="product_price d-flex justify-content-center">
                                                        {{ formatPrice($product->price) }}</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                            <div class="mt-5">
                                @if ($products->hasPages())
                                    {{ $products->withQueryString()->links() }}
                                @endif
                            </div>
                        @else
                            <div class="col-12">
                                <h2 class="text-center">Không có sản phẩm nào</h2>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('.selectSort').change(function() {
                $('.formSort').submit()
            })
        })
    </script>
@endpush
