@extends('frontend.layouts.master')

@section('content')
    <main class="">
        <!-- ************************* PRODUCT DETAIL ************************* -->

        <section class="product_detail_page">
            <div class="produt_detail_items col-12">
                <div style="background-image: url({{ asset('frontend/assets/images/backgroundproduct.webp') }})"
                    class="product_background_img w-100"></div>
                <div class="product_section_content container">
                    <div class="col-12 breadcrumb_list">
                        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Library</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-12 product_detail_container d-lg-flex">
                        <div class="col-lg-6 col-12 product_detail_img_info product_detail_left">
                            <div class="col-12 product_detail_left_container d-sm-flex">
                                <div class="col-sm-6 col-12 product_detail_img_left pe-5">
                                    <img src="{{ asset($product->image) }}" alt="">
                                </div>
                                <div class="col-sm-6 col-12 product_detail_infoReview_right my-sm-0 my-4">
                                    <div class="col-12 product_detail_infoReview_item d-flex">
                                        <div class="icon_product_detail_bg">
                                            <i style="color: white;" class="fas fa-comment-smile"></i>
                                        </div>
                                        <div class="icon_product_text">
                                            <p>{{ $commentsCount }}</p>
                                            <strong>
                                                <a href="#reviews">Đánh Giá Từ Khách Hàng
                                                </a>
                                            </strong>
                                        </div>
                                    </div>
                                    <div class="col-12 product_detail_infoReview_item d-flex">
                                        <div class="icon_product_detail_bg">
                                            <i style="color: white;" class="fas fa-shopping-cart"></i>
                                        </div>
                                        <div class="icon_product_text">
                                            <strong>{{ $orderProductCount }}</strong>
                                            <p>Đã Bán</p>
                                        </div>
                                    </div>
                                    <div class="col-12 product_detail_infoReview_item d-flex">
                                        <div class="icon_product_detail_bg">
                                            <i class="fas fa-shield" style="color: #5bc014;"></i>
                                        </div>
                                        <div class="icon_product_text">
                                            <strong>Chính Sách Bảo Hành</strong>
                                        </div>
                                    </div>
                                    <div class="col-12 product_detail_infoReview_item d-flex">
                                        <div class="icon_product_detail_bg">
                                            <i class="fas fa-star" style="color: #FFD43B;"></i>
                                        </div>
                                        <div class="icon_product_text">
                                            @for ($i = 0; $i < 5; $i++)
                                                @if ($i < $averageRating)
                                                    <i class="fas fa-star" style="color: #FFD43B;"></i>
                                                @else
                                                    <i class="far fa-star" style="color: #FFD43B;"></i>
                                                @endif
                                            @endfor
                                            <strong style="color: #FFD43B; margin-left: 5px;"> {{ $averageRating }}</strong>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-12 product_detail_infoProduct product_Detail_right">
                            <div class="col-12 product_detail_infoProduct_container">
                                <div class="col-12 name_product_detail">
                                    <h2 id="name_product_detail">{!! $product->name !!}</h2>
                                </div>
                                <div class="col-12 price-range_product_detail my-3">
                                    {{-- <h2 id="rangepriceProductDetail">239,000đ - 840,000đ</h2> --}}
                                    <h2 id="priceProductDetail">{{ formatPrice($product->price) }}</h2>
                                </div>
                                {{-- <div class="col-12 variable_product_container">
                                    <div class="variable_product_items d-flex">
                                        <div data-id="1" class="variable_product active">Gói Gia Đình</div>
                                        <div data-id="2" class="variable_product">Gói Cá Nhân</div>
                                        <div data-id="3" class="variable_product">Gói Dùng Chung</div>
                                    </div>
                                </div> --}}
                                @if (count($productVariantItems) > 0)
                                    <div class="col-12 variable_product_container variable_product_time_container">
                                        <h3 id="variable_title">Thời Hạn</h3>
                                        <div class="variable_product_items d-flex">
                                            @foreach ($productVariantItems as $productVariantItem)
                                                <a href="{{ route('products.show', $productVariantItem->product->slug) }}">
                                                    <div data-id="{{ $productVariantItem->product_id }}"
                                                        class="variable_product {{ $productVariantItem->product->slug == $product->slug ? 'active' : '' }}">
                                                        {!! $productVariantItem->name !!}</div>
                                                </a>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif
                                <div class="col-12 action_product_container d-flex">
                                    <form action="" method="get">
                                        @if ($product->quantity > 0)
                                            <button type="submit" id="btn_checkout" class="shadow-lg"><i
                                                    class="fas fa-wallet fa-fw"></i>Mua
                                                Ngay</button>
                                        @endif

                                    </form>
                                    <form action="{{ route('cart.store') }}" method="post" id="formAddToCart">
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        <input type="hidden" name="name" value="{{ $product->name }}">
                                        <input type="hidden" name="slug" value="{{ $product->slug }}">
                                        <input type="hidden" name="category_id" value="{{ $product->category_id }}">
                                        <input type="hidden" name="image" value="{{ $product->image }}">
                                        <input type="hidden" name="price" value="{{ $product->price }}">
                                        <input type="hidden" name="quantity" value="1">
                                        @if ($product->quantity > 0)
                                            <button type="submit" id="btn_addToCart" class="shadow-lg"><i
                                                    class="fas fa-shopping-cart"></i>Thêm Vào Giỏ Hàng</button>
                                        @else
                                            <button type="button" id="btn_addToCart" class="outProduct" disabled><i
                                                    class="fas fa-box-open"></i></i>Hết Hàng</button>
                                        @endif
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ************************* PRODUCT DETAIL INFO ************************* -->
        <section class="product_detail_info">
            <div class="product_detail_info_container container">
                <!-- ************************* SECTION PRODUCT DETAIL Guarantee ************************* -->
                <section class="product_detail_info_guar_section col-10">
                    <div class="product_detail_info_guar_container d-flex col-12 justify-content-around">
                        <div class="product_detail_info_delivery product_detail_item col-4">
                            <div class="container_info_icon">
                                <i style="color: #50B000;" class="fas fa-box-check fa-fw"></i>
                            </div>
                            <div class="content_info">
                                <span>Giao Hàng</span>
                                <p>Gửi Tài Khoản Qua Email</p>
                            </div>
                        </div>
                        <div class="product_detail_info_deliveryTime product_detail_item col-4 mx-3">
                            <div class="container_info_icon">
                                <i class="fas fa-shipping-fast" style="color: #5cc400;"></i>
                            </div>
                            <div class="content_info">
                                <span>Thời Gian Giao Hàng</span>
                                <p>10 - 30 phút</p>
                            </div>
                        </div>
                        <div class="product_detail_info_guarantee product_detail_item col-4 ">
                            <div class="container_info_icon">
                                <i class="fas fa-shield-check" style="color: #036cb5;"></i>
                            </div>
                            <div class="content_info">
                                <span>Giao Hàng</span>
                                <p>Gửi Tài Khoản Qua Email</p>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- ************************* SHORT DESCRIPTION ************************* -->
                <section class="product_detail_short_description col-10 my-5">
                    <h2 id="title"><strong>MÔ TẢ NGẮN</strong> SẢN PHẨM</h2>
                    <div class="product_detail_short_description_container">
                        {!! $product->short_description !!}
                    </div>
                </section>
                <!-- ************************* PRODUCT INFOMATION ************************* -->
                <section class="product_detail_short_description product_infomation col-10 my-5">
                    <h2 id="title"><strong>THÔNG TIN</strong> SẢN PHẨM</h2>
                    <div class="product_detail_short_description_container">
                        {!! $product->description !!}
                    </div>
                </section>
                <!-- ************************* SHORT DESCRIPTION ************************* -->
                <section class="product_detail_short_description comments_from_customers col-10 my-5">
                    <h2 id="title"><strong>ĐÁNH GIÁ - NHẬN XÉT</strong> TỪ KHÁCH HÀNG</h2>
                    <div class="rate_comments_from_customers">
                        <!-- ****** SEND MESSAGE AND TABLE RATE***** -->
                        <div class="col-12 rate_comments_from_customers_items d-lg-flex border rounded p-4">
                            <div class="col-lg-4 rate_comments_from_customers_item_left">
                                <div class="review-rating__summary col-12 d-flex">
                                    <div class="review-rating__point">4</div>
                                    <div class="review-rating__stars">
                                        <div class="total_comment">
                                            @for ($i = 0; $i < 5; $i++)
                                                @if ($i < $averageRating)
                                                    <i class="fas fa-star" style="color: #FFD43B;"></i>
                                                @else
                                                    <i class="far fa-star" style="color: #FFD43B;"></i>
                                                @endif
                                            @endfor
                                        </div>
                                        <div class="rating__stars_content">{{ $commentsCount }} đánh giá</div>

                                    </div>
                                </div>
                                <div class="review-rating__level col-12 mt-3">
                                    <div class="review-rating__level_item">
                                        <div class="line_star_level d-flex">
                                            <div class="line_star_level_container">
                                                <i style="color: #FFD43B;" class="fas fa-star fa-fw"></i>
                                                <i style="color: #FFD43B;" class="fas fa-star fa-fw"></i>
                                                <i style="color: #FFD43B;" class="fas fa-star fa-fw"></i>
                                                <i style="color: #FFD43B;" class="fas fa-star fa-fw"></i>
                                                <i style="color: #FFD43B;" class="fas fa-star fa-fw"></i>
                                            </div>
                                            <div class="line_star_total"> &nbsp; <i class="fal fa-grip-lines-vertical"
                                                    style="color: #FFD43B;"></i> &nbsp; {{ $rate5Star }}</div>
                                        </div>
                                    </div>
                                    <div class="review-rating__level_item">
                                        <div class="line_star_level d-flex">
                                            <div class="line_star_level_container">
                                                <i style="color: #FFD43B;" class="fas fa-star fa-fw"></i>
                                                <i style="color: #FFD43B;" class="fas fa-star fa-fw"></i>
                                                <i style="color: #FFD43B;" class="fas fa-star fa-fw"></i>
                                                <i style="color: #FFD43B;" class="fas fa-star fa-fw"></i>
                                                <i style="color: #FFD43B;" class="far fa-star fa-fw"></i>
                                            </div>
                                            <div class="line_star_total"> &nbsp; <i class="fal fa-grip-lines-vertical"
                                                    style="color: #FFD43B;"></i> &nbsp;
                                                {{ $rate4Star }}</div>
                                        </div>
                                    </div>
                                    <div class="review-rating__level_item">
                                        <div class="line_star_level d-flex">
                                            <div class="line_star_level_container">
                                                <i style="color: #FFD43B;" class="fas fa-star fa-fw"></i>
                                                <i style="color: #FFD43B;" class="fas fa-star fa-fw"></i>
                                                <i style="color: #FFD43B;" class="fas fa-star fa-fw"></i>
                                                <i style="color: #FFD43B;" class="far fa-star fa-fw"></i>
                                                <i style="color: #FFD43B;" class="far fa-star fa-fw"></i>

                                            </div>
                                            <div class="line_star_total"> &nbsp; <i class="fal fa-grip-lines-vertical"
                                                    style="color: #FFD43B;"></i> &nbsp;
                                                {{ $rate3Star }}</div>
                                        </div>
                                    </div>
                                    <div class="review-rating__level_item">
                                        <div class="line_star_level d-flex">
                                            <div class="line_star_level_container">
                                                <i style="color: #FFD43B;" class="fas fa-star fa-fw"></i>
                                                <i style="color: #FFD43B;" class="fas fa-star fa-fw"></i>
                                                <i style="color: #FFD43B;" class="far fa-star fa-fw"></i>
                                                <i style="color: #FFD43B;" class="far fa-star fa-fw"></i>
                                                <i style="color: #FFD43B;" class="far fa-star fa-fw"></i>

                                            </div>
                                            <div class="line_star_total"> &nbsp; <i class="fal fa-grip-lines-vertical"
                                                    style="color: #FFD43B;"></i> &nbsp;
                                                {{ $rate2Star }}</div>
                                        </div>
                                    </div>
                                    <div class="review-rating__level_item">
                                        <div class="line_star_level d-flex">
                                            <div class="line_star_level_container">
                                                <i style="color: #FFD43B;" class="fas fa-star fa-fw"></i>
                                                <i style="color: #FFD43B;" class="far fa-star fa-fw"></i>
                                                <i style="color: #FFD43B;" class="far fa-star fa-fw"></i>
                                                <i style="color: #FFD43B;" class="far fa-star fa-fw"></i>
                                                <i style="color: #FFD43B;" class="far fa-star fa-fw"></i>
                                            </div>
                                            <div class="line_star_total"> &nbsp; <i class="fal fa-grip-lines-vertical"
                                                    style="color: #FFD43B;"></i> &nbsp;
                                                {{ $rate1Star }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if (Auth::check())
                                <div class="col-lg-8 rate_comments_from_customers_item_right">
                                    <form id="product-form-comment" action="{{ route('product-comment.create') }}"
                                        method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="" id="ratingComment"></div>
                                        <input type="hidden" name="rating" id="rating" value="0">
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        <textarea style="resize: none;" class="form-control my-3" name="comment" id="commentText" cols="10"
                                            rows="5"></textarea>
                                        <div class="buttonAction d-flex">
                                            <div class="col-12 buttonSendComment d-flex justify-content-center">
                                                <button class="sendCommentBtn btn btn-success" type="submit">Gửi Đánh
                                                    Giá</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            @endif
                        </div>
                        <!-- ****** COMMENT OF USER***** -->
                        <div id="reviews" class="comment_from_customers_container border rounded my-4">
                            <div class="comment_from_customers_items my-3">
                                @if ($comments->count() > 0)
                                    @foreach ($comments as $comment)
                                        <div id="" class="comment_from_customers_item col-12 d-flex my-4">
                                            <div class="col-md-2 col-sm-1 col-2 img_customers">
                                                <img class="img_users" src="{{ asset($comment->user->image) }}"
                                                    alt="">
                                            </div>
                                            <div class="col-md-10 col-sm-11 col-10 info_customers">
                                                <div class="info_customers_container">
                                                    <div class="col-12 name_user">{{ $comment->user->name }}
                                                        @php
                                                            $getOrder = App\Models\Order::where(
                                                                'user_id',
                                                                $comment->user->id,
                                                            )->first();
                                                            if ($getOrder != null) {
                                                                $getOrderProductCount = App\Models\OrderProduct::where(
                                                                    'order_id',
                                                                    $getOrder->id,
                                                                )->count();
                                                            } else {
                                                                $getOrderProductCount = '';
                                                            }
                                                        @endphp
                                                        @if ($getOrderProductCount > 0 && $getOrder != null)
                                                            <span style="color: #009900;">
                                                                <i class="far fa-shopping-cart" style="color: #009900;">
                                                                </i>
                                                                Đã Mua Hàng Từ Gamikey</span>
                                                        @else
                                                            <span style="color: #036cb5;">
                                                                <i class="fas fa-user"></i>
                                                                Hỏi Đáp</span>
                                                        @endif
                                                    </div>
                                                    <div class="col-12 time_comment">
                                                        {{-- FORMAT CREATE_DATE to Vietnamese  --}}
                                                        <p>{{ $comment->created_at->format('H:i:s - d-m-Y') }}</p>
                                                    </div>
                                                    <div class="col-12 comment_text">
                                                        {{-- LIMIT TEXT 500 WORDS --}}
                                                        {!! Str::limit($comment->comment, 500) !!}
                                                    </div>
                                                    <div class="col-12 replyComment">
                                                        @if (Auth::check())
                                                            <button id="replyCommentUser" class="replyCommentUser"
                                                                data-id="{{ $comment->id }}"
                                                                data-user="{{ $comment->user->name }}">Trả
                                                                Lời</button>
                                                        @endif
                                                    </div>
                                                </div>
                                                <!-- ****** COMMENT REPLY ***** -->
                                                @if ($comment->replyComments->count() > 0)
                                                    @foreach ($comment->replyComments as $replyComment)
                                                        <div
                                                            class="comment_customer_reply {{ Auth::check() ? '' : 'my-5' }}">
                                                            <div class="comment_from_customers_item col-12 d-flex">
                                                                <div class="col-md-2 col-sm-1 col-2 img_customers">
                                                                    <img class="img_users"
                                                                        src="{{ asset($replyComment->user->image) }}"
                                                                        alt="">
                                                                </div>
                                                                <div class="col-md-10 col-sm-11 col-10 info_customers">
                                                                    <div class="info_customers_container">
                                                                        <div class="col-12 name_user">
                                                                            {{ $replyComment->user->name }}
                                                                            @php
                                                                                $getOrder = App\Models\Order::where(
                                                                                    'user_id',
                                                                                    $replyComment->user->id,
                                                                                )->first();
                                                                                if ($getOrder != null) {
                                                                                    $getOrderProductCount = App\Models\OrderProduct::where(
                                                                                        'order_id',
                                                                                        $getOrder->id,
                                                                                    )->count();
                                                                                } else {
                                                                                    $getOrderProductCount = '';
                                                                                }
                                                                            @endphp
                                                                            @if ($getOrderProductCount > 0 && $getOrder != null)
                                                                                <span style="color: #009900;">
                                                                                    <i class="far fa-shopping-cart"
                                                                                        style="color: #009900;">
                                                                                    </i>
                                                                                    Đã Mua Hàng Từ Gamikey</span>
                                                                            @else
                                                                                <span style="color: #036cb5;">
                                                                                    <i class="fas fa-user"></i>
                                                                                    Hỏi Đáp</span>
                                                                            @endif
                                                                        </div>
                                                                        <div class="col-12 time_comment">
                                                                            <p>{{ $replyComment->created_at->format('H:i:s - d-m-Y') }}
                                                                            </p>
                                                                        </div>
                                                                        <div class="col-12 comment_text">
                                                                            {!! Str::limit($replyComment->comment, 500) !!}
                                                                        </div>
                                                                        @if (Auth::check())
                                                                            <div class="col-12 replyComment">
                                                                                <button id="replyCommentUser"
                                                                                    class="replyCommentUser"
                                                                                    data-id="{{ $comment->id }}"
                                                                                    data-user="{{ $replyComment->user->name }}">Trả
                                                                                    Lời</button>
                                                                            </div>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @endif


                                                <!-- ****** FORM REPLY ***** -->
                                                <div class="form_reply_customers">
                                                    <div class="col-12 d-flex">
                                                        <div
                                                            class="col-2 form_reply_customers_img d-flex justify-content-center">
                                                            <img src="{{ @Auth::user()->image }}" alt="">
                                                        </div>
                                                        <div class="col-10 form_reply_customers_input">
                                                            <form action="{{ route('product-reply-comment.create') }}"
                                                                method="POST" id="formReply">
                                                                <input type="hidden" name="product_id"
                                                                    value="{{ $product->id }}">
                                                                <input type="hidden" name="product_comment_id"
                                                                    value="{{ $comment->id }}">
                                                                <input class="form-control text_reply_input"
                                                                    type="text" name="comment">
                                                                <button id="sendReply" class="sendReply">
                                                                    <i class="fas fa-paper-plane"></i>
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                            </div>
                        @else
                            {{-- Không có bình luận nào --}}
                            <div class="comment_from_customers_item col-12 d-flex my-4 px-5">
                                <div class="alert alert-warning col-12 text-center " role="alert">
                                    Không có bình luận nào
                                </div>
                            </div>
                            @endif

                        </div>
                    </div>
                </section>

                <!-- ************************* SIMILAR PRODUCT ************************* -->
                <section class="similar_product col-10 my-5">
                    <h2 id="title"><strong>SẢN PHẨM</strong> TƯƠNG TỰ</h2>
                    <div class="similar_product_container">
                        <div class="section-product-items row d-flex">
                            @foreach ($products as $product)
                                <div class="section-product-item col-xl-4 col-sm-6 col-md-4 col-6">
                                    <a href="{{ route('products.show', $product->slug) }}"
                                        class="section-product-anchor">
                                        <div class="col-12 d-xl-flex border shadow-lg">
                                            <div class="col-xl-6 section-product-left">
                                                <img style="height: 180px;" loading="lazy" class="section-product-img"
                                                    src="{{ asset($product->image) }}" alt="">
                                            </div>
                                            <div class="col-xl-6 section-product-right p-2">
                                                <div class="col-12 section-product-name">
                                                    <h3 class="product_name">{!! $product->name !!}</h3>
                                                </div>
                                                <div class="col-12 section-product-middle d-flex py-2 align-items-center">
                                                    <div
                                                        class="col-6 section-product-categories d-flex align-items-center">
                                                        <p>{{ $product->category->name }}</p>
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
                        </div>
                    </div>
                </section>
            </div>
        </section>
    </main>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#btn_addToCart').on('click', function(e) {
                e.preventDefault();
                let data = $('#formAddToCart').serialize();
                let url = $('#formAddToCart').attr('action');
                //    Kiểm tra xem nút này có attr disabled không
                if ($(this).attr('disabled')) {
                    toastr.error('Sản phẩm đã hết hàng');
                    $('#formAddToCart').attr('disabled', 'disabled');
                    return false;
                }
                $.ajax({
                    url: url,
                    method: 'POST',
                    data: data,
                    beforeSend: function() {
                        $('#btn_addToCart').html(
                            '<i class="fas fa-spinner fa-spin"></i> Đang xử lý...');
                    },
                    success: function(response) {
                        if (response.status == 'success') {
                            countCart();
                            countPriceTotal();
                            fetchSidebarCartProducts()
                            toastr.success(response.message);
                        } else if (response.status == 'error') {
                            toastr.error(response.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        var err = JSON.parse(xhr.responseText);
                        toastr.error(err.message);
                    },
                    complete: function() {
                        $('#btn_addToCart').html(
                            '<i class="fas fa-shopping-cart"></i> Thêm Vào Giỏ Hàng');
                    }
                })
            })

            // ? Get innerHTML of class js-wc-rating-value
            $('#ratingComment').on('click', function() {
                let rating = $('.js-wc-rating-value').html();
                $('#rating').val(rating);
            })

            $('body').on('click', '.sendCommentBtn', function(e) {
                e.preventDefault();
                let data = $('#product-form-comment').serialize();
                let url = $('#product-form-comment').attr('action');
                let rating = $('.js-wc-rating-value').val();
                let formInput = $('#product-form-comment').find('#commentText').val();
                renderNewCommentHTML(formInput);
                $.ajax({
                    url: url,
                    method: 'POST',
                    data: data,
                    success: function(response) {
                        console.log(response);
                        if (response.status == 'success') {
                            toastr.success(response.message);
                            $('#product-form-comment')[0].reset();
                        } else if (response.status == 'error') {
                            toastr.error(response.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        var err = JSON.parse(xhr.responseText);
                        toastr.error(err.message);
                    }
                })
            })

            $('body').on('click', '.replyCommentUser', function() {
                let commentId = $(this).data('id');
                let userName = $(this).data('user');
                // Add @username to class form_reply_customers and make it display block
                // ? Only show in that comment
                $(this).parents('.comment_from_customers_item').find('.form_reply_customers').css('display',
                    'block');
                $(this).parents('.comment_from_customers_item').find('.text_reply_input').val('@' +
                    userName + ' ');
            })

            $('body').on('click', '.sendReply', function(e) {
                e.preventDefault();
                let data = $(this).parents('form').serialize();
                let url = $(this).parents('form').attr('action');
                $.ajax({
                    url: url,
                    method: 'POST',
                    data: data,
                    success: function(response) {
                        if (response.status == 'success') {
                            toastr.success(response.message);
                            $(this).parents('form')[0].reset();
                        } else if (response.status == 'error') {
                            toastr.error(response.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        var err = JSON.parse(xhr.responseText);
                        toastr.error(err.message);
                    }
                })
            })

            function renderNewCommentHTML(formInput) {
                let html =
                    `
                        <div id="" class="comment_from_customers_item col-12 d-flex my-4">
                            <div class="col-md-2 col-sm-1 col-2 img_customers">
                                @if (Auth::check())
                                    <img class="img_users" src="{!! asset(Auth::user()->image) !!}"
                                @else
                                    <img class="img_users" src="path/to/default/image.jpg"
                                @endif
                                    alt="">
                            </div>
                            <div class="col-md-10 col-sm-11 col-10 info_customers">
                                <div class="info_customers_container">
                                    <div class="col-12 name_user">{!! @Auth::user()->name !!}
                                            <span style="color: #036cb5;">
                                                <i class="fas fa-user"></i>
                                                Hỏi Đáp </span>
                                    </div>
                                    <div class="col-12 time_comment">
                                        {{-- FORMAT CREATE_DATE to Vietnamese  --}}
                                        <p>{{ now()->format('H:i:s - d-m-Y') }}</p>
                                    </div>
                                    <div class="col-12 comment_text">
                                        {{-- LIMIT TEXT 500 WORDS --}}
                                        ${formInput}
                                    </div>
                                </div>
                                <!-- ****** FORM REPLY ***** -->
                                <div class="form_reply_customers">
                                    <div class="col-12 d-flex">
                                        <div
                                            class="col-2 form_reply_customers_img d-flex justify-content-center">
                                            <img src="{{ @Auth::user()->image }}" alt="">
                                        </div>
                                        <div class="col-10 form_reply_customers_input">
                                            <form action="{{ route('product-reply-comment.create') }}"
                                                method="POST" id="formReply">
                                                <input type="hidden" name="product_id"
                                                    value="{{ @$product->id }}">
                                                <input type="hidden" name="product_comment_id"
                                                    value="{{ @$comment->id }}">
                                                <input class="form-control text_reply_input"
                                                    type="text" name="comment">
                                                <button id="sendReply" class="sendReply">
                                                    <i class="fas fa-paper-plane"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                `;
                $('.comment_from_customers_items').prepend(html);
            }

            /* function getStarRatingAndCommentCount() {
                $.ajax({
                    url: "{{ route('home', $product->id) }}",
                    method: 'GET',
                    success: function(response) {
                        if (response.status == 'success') {
                            $('.total_comment').html(response.data.commentsCount + ' đánh giá');
                            $('.line_star_total').eq(0).html('&nbsp;<i class="fal fa-grip-lines-vertical" style="color: #FFD43B;"></i>&nbsp;' + response.data.rate5Star);
                            $('.line_star_total').eq(1).html('&nbsp;<i class="fal fa-grip-lines-vertical" style="color: #FFD43B;"></i>&nbsp;' + response.data.rate4Star);
                            $('.line_star_total').eq(2).html('&nbsp;<i class="fal fa-grip-lines-vertical" style="color: #FFD43B;"></i>&nbsp;' + response.data.rate3Star);
                            $('.line_star_total').eq(3).html('&nbsp;<i class="fal fa-grip-lines-vertical" style="color: #FFD43B;"></i>&nbsp;' + response.data.rate2Star);
                            $('.line_star_total').eq(4).html('&nbsp;<i class="fal fa-grip-lines-vertical" style="color: #FFD43B;"></i>&nbsp;' + response.data.rate1Star);
                        }
                    }
                })
            } */
        });
    </script>
@endpush
