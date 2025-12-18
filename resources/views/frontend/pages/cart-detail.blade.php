@extends('frontend.layouts.master')

@section('content')
    <main class="pt-5">
        <section class="container">
            <div class="cart_container">
                <div class="cart_container_section col-12 d-lg-flex">
                    <div class="col-lg-8 col-12 cart_container_left p-4 border rounded me-4 shadow-lg">
                        <h2>Giỏ Hàng - <span id="count-main-cart">{{ Cart::count() }}</span> sản phẩm <span
                                style="float: right; margin-right: 15px;"><a id="clearCart" href="{{ route('cart.clear') }}"
                                    title="Xóa Giỏ Hàng">Xóa Tất Cả
                                </a></span></h2>
                        <div class="cart_container_items pt-sm-0 pt-1">
                            @if (Cart::count() > 0)
                                @foreach ($cartItems as $cartItem)
                                    <div id="cart_container_item_{{ $cartItem->rowId }}"
                                        class="cart_container_item shadow d-sm-flex align-items-center border rounded p-3 mt-4">
                                        <div class="col-sm-2 col-12 cart_product_img">
                                            <img class="cart_container_item_img"
                                                src="{{ asset($cartItem->options->image) }}" alt="">
                                        </div>
                                        <div class="col-sm-5 col-12 my-sm-0 my-3 cart_product_text">
                                            <a href="{{ route('products.show', $cartItem->options->slug) }}"
                                                class="cart_container_item_name">{!! $cartItem->name !!}</a>
                                            <br>
                                            <p class="categories">Danh Mục: <a
                                                    href="">{{ $cartItem->options->category_id }}</a></p>
                                            <p class="cart_container_item_price">{{ formatPrice($cartItem->price) }}</p>
                                        </div>
                                        <div class="col-sm-4 col-12 cart_product_qty d-flex justify-content-center">
                                            <button data-id="{{ $cartItem->rowId }}" data-product="{{ $cartItem->id }}"
                                                class="decreQty"><i class="far fa-minus fa-fw"
                                                    title="Giảm Số Lượng"></i></button>
                                            <input type="phone" class="cart_container_item_qty"
                                                value="{{ $cartItem->qty }}" min="1" max="10" readonly>
                                            <button data-id="{{ $cartItem->rowId }}" data-product="{{ $cartItem->id }}"
                                                class="increQty"><i class="far fa-plus fa-fw"
                                                    title="Tăng Số Lượng"></i></button>
                                        </div>
                                        <div
                                            class="col-sm-1 col-12 cart_product_action d-sm-block d-flex justify-content-end">
                                            <button data-id="{{ $cartItem->rowId }}"
                                                class="cart_container_item_remove deleteBtn" title="Xóa Sản Phẩm Này"><i
                                                    class="fas fa-trash-alt"></i></button>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="alert alert-danger text-center">Không có sản phẩm nào trong giỏ hàng</div>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-4 col-12 cart_container_right mt-sm-0 mt-4">
                        <div class="cart_container_right_section border rounded p-4 shadow-lg">
                            <div class="amout_product_cart">
                                <h2>Thanh Toán</h2>
                                <form id="coupon_form" class="coupon_cart d-flex my-3">
                                    <input id="inputCoupon" class="form-control" type="text"
                                        placeholder="Nhập Mã Giảm Giá"
                                        value="{{ session()->has('coupon') ? session()->get('coupon')['code'] : '' }}">
                                    <button type="submit" id="applyCoupon">Áp Dụng</button>
                                </form>
                                <h4>Giá trị sản phẩm: <span
                                        class="sub_total_price">{{ formatPrice(Cart::priceTotal()) }}</span>
                                </h4>
                                <h4>Giảm Giá: <span id="discount_price">{{ formatPrice(getDiscountCartTotal()) }}</span>
                                </h4>
                                <h4>Tổng Tiền: <span id="total_price">{{ formatPrice(getMainCartTotal()) }}</span></h4>
                                <div class="line-separation"></div>
                                <br>
                                {{-- <a href="login.html" class="my-1">Hãy Đăng Nhập Để Nhận Nhiều Ưu Đãi Hơn</a>  --}}
                                <div class="payment_method">
                                    <div class="payment_method_list">
                                        <div class="action_payment_method d-flex justify-content-between">
                                            @if (Cart::count() > 0)
                                                <a href="{{ route('home') }}" class="btn"><i
                                                        class="fas fa-home-lg fa-fw"></i>&nbsp; &nbsp; Mua Tiếp</a>
                                                <a href="{{ route('checkout') }}" class="btn">Thanh Toán &nbsp; &nbsp;
                                                    <i class="fas fa-fast-forward" disabled></i></a>
                                            @else
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
        </section>
    </main>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            // ? Ajax Setup
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            // ? Increase Quantity Product
            $('.cart_container_items').on('click', '.decreQty', function() {
                let id = $(this).data('id');
                let qty = parseInt($(this).siblings('.cart_container_item_qty').val()) - 1;
                if (qty < 1) {
                    return toastr.error('Số lượng sản phẩm không thể nhỏ hơn 1');
                }
                let qtyInput = $(this).siblings('.cart_container_item_qty').val(qty);
                $.ajax({
                    url: " {{ route('cart.update') }} ",
                    method: 'POST',
                    data: {
                        id: id,
                        qty: qty,
                    },
                    success: function(response) {
                        if (response.status == 'success') {
                            countCart();
                            countPriceTotal();
                            calculateCouponDiscount();
                            toastr.success(response.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr);
                    }
                })
            })
            // ? Decrease Quantity Product
            $('.cart_container_items').on('click', '.increQty', function() {
                let id = $(this).data('id');
                let productId = $(this).data('product');
                let qty = parseInt($(this).siblings('.cart_container_item_qty').val()) + 1;
                if (qty > 10) {
                    return toastr.error('Số lượng sản phẩm không thể lớn hơn 10');
                }
                let qtyInput = $(this).siblings('.cart_container_item_qty').val(qty);
                $.ajax({
                    url: " {{ route('cart.update') }} ",
                    method: 'POST',
                    data: {
                        id: id,
                        productId: productId,
                        qty: qty,
                    },
                    success: function(response) {
                        if (response.status == 'success') {
                            countCart();
                            countPriceTotal();
                            calculateCouponDiscount()
                            toastr.success(response.message);
                        } else if (response.status == 'error') {
                            toastr.error(response.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr);
                    }
                })
            })
            // ? Delete Product In Cart
            $('body').on('click', '.deleteBtn', function(event) {
                event.preventDefault();
                let id = $(this).data('id');
                Swal.fire({
                    title: 'Bạn có chắc chắn muốn xóa?',
                    text: "Dữ liệu bị xóa sẽ không thể khôi phục lại được!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Đồng ý, xóa nó đi!',
                    cancelButtonText: 'Hủy'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: 'POST',
                            data: {
                                id: id
                            },
                            url: "{{ route('cart.delete') }}",
                            success: function(data) {
                                if (data.status == 'success') {
                                    Swal.fire(
                                        'Đã Xóa!',
                                        data.message,
                                        'success'
                                    )
                                    $('#cart_container_item_' + id).remove();
                                    countCart();
                                    countPriceTotal();
                                    calculateCouponDiscount()
                                    $('#count-main-cart').text(0);
                                } else if (data.status == 'error') {
                                    Swal.fire(
                                        'Lỗi!',
                                        data.message,
                                        'error'
                                    )
                                    window.location.reload();
                                }
                            },
                            error: function(xhr, status, error) {
                                Swal.fire(
                                    'Lỗi!',
                                    error,
                                    'error'
                                )
                                window.location.reload();
                            }
                        })
                    }
                })
            })
            // ? Delete All Product In Cart
            $('body').on('click', '#clearCart', function(event) {
                event.preventDefault();
                let url = $(this).attr('href');
                Swal.fire({
                    title: 'Bạn có chắc chắn muốn xóa?',
                    text: "Tất Cả Sản Phẩm Trong Giỏ Hàng Sẽ Được Xóa!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Đồng ý, xóa nó đi!',
                    cancelButtonText: 'Hủy'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: 'POST',
                            url: "{{ route('cart.clear') }}",
                            success: function(data) {
                                if (data.status == 'success') {
                                    Swal.fire(
                                        'Đã Xóa!',
                                        data.message,
                                        'success'
                                    )
                                    $('.cart_container_items').empty();
                                    countCart();
                                    countPriceTotal();
                                    $('#count-main-cart').text(0);
                                } else if (data.status == 'error') {
                                    Swal.fire(
                                        'Lỗi!',
                                        data.message,
                                        'error'
                                    )
                                    window.location.reload();
                                }
                            },
                            error: function(xhr, status, error) {
                                Swal.fire(
                                    'Lỗi!',
                                    error,
                                    'error'
                                )
                                window.location.reload();
                            }
                        })
                    }
                })
            })

            // Ajax Apply Coupon
            $('#applyCoupon').on('click', function(event) {
                event.preventDefault();
                let coupon = $('#inputCoupon').val();
                $.ajax({
                    type: 'GET',
                    url: "{{ route('apply-coupon') }}",
                    data: {
                        coupon: coupon
                    },
                    success: function(response) {
                        if (response.status == 'success') {
                            toastr.success(response.message);
                            // countPriceTotal();
                            calculateCouponDiscount()
                        } else {
                            toastr.error(response.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr);
                    }
                })
            })

            // Calculate Coupon Discount
            function calculateCouponDiscount() {
                $.ajax({
                    url: "{{ route('coupon-calculation') }}",
                    method: 'GET',
                    success: function(response) {
                        if (response.status == 'success') {
                            // ? Format Price to VND

                            $('#discount_price').text(formatPrice(response.discount));
                            $('#total_price').text(formatPrice(response.cart_total));
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr);
                    }
                })
            }
        });
    </script>
@endpush
