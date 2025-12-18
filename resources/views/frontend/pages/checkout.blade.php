@extends('frontend.layouts.master')

@section('content')
    <main class="pt-5">
        <section class="container">
            <div class="cart_container">
                <div class="cart_container_section col-12 d-lg-flex">
                    <div class="col-lg-8 col-12 cart_container_left p-4 border rounded me-4 shadow-lg">
                        <div class="col-12">
                            @if (!auth()->check())
                                <p>Bạn đã có tài khoản? <a href="">Ấn vào đây để đăng nhập</a></p>
                            @endif
                        </div>
                        <h2>THÔNG TIN GIỎ HÀNG</h2>
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
                                        {{-- <div class="col-sm-4 col-12 cart_product_qty d-flex justify-content-center">
                                            <button data-id="{{ $cartItem->rowId }}" class="decreQty"><i
                                                    class="far fa-minus fa-fw" title="Giảm Số Lượng"></i></button>
                                            <input type="phone" class="cart_container_item_qty"
                                                value="{{ $cartItem->qty }}" min="1" max="10" readonly>
                                            <button data-id="{{ $cartItem->rowId }}" class="increQty"><i
                                                    class="far fa-plus fa-fw" title="Tăng Số Lượng"></i></button>
                                        </div> --}}
                                        <div class="col-sm-5 col-12 cart_product_action d-flex justify-content-end">
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
                        <div class="col-12 cart_form_checkout my-5 d-flex flex-wrap">
                            <div class="col-12">
                                <h2>THÔNG TIN THANH TOÁN</h2>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="fullname">Họ và Tên</label>
                                    <input type="text" class="form-control" id="fullname" placeholder="Nhập Họ và Tên"
                                        name="fullname" value="{{ @Auth::user()->name }}">
                                </div>
                            </div>
                            @php
                            @endphp
                            <div class="col-6">
                                <!-- Số điện thoại -->
                                <div class="form-group ps-3">
                                    <label for="phone">Số Điện Thoại</label>
                                    <input type="text" class="form-control" id="phone"
                                        placeholder="Nhập Số Điện Thoại" name="phone" value="{!! @Auth::user()->phone !!}">
                                </div>
                            </div>
                            <div class="col-12 my-3">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control" id="email" placeholder="Nhập Email"
                                        name="email" value="{!! @Auth::user()->email !!}">
                                    <label for="email" class="text-danger mt-2">Vui lòng nhập chính xác email để nhận
                                        hàng nhanh nhất</label>
                                </div>
                            </div>
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
                                <!-- <a href="login.html" class="my-1">Hãy Đăng Nhập Để Nhận Nhiều Ưu Đãi Hơn</a> -->
                                <div class="payment_method">
                                    <h4>Phương Thức Thanh Toán</h4>
                                    <div class="payment_method_list">
                                        <form action="" method="get" id="formCheckout">
                                            <div class="payment_method_item radio-item d-flex align-items-center">
                                                <input type="radio" name="payment_method" id="payment_method_momo"
                                                    value="momo">
                                                <label for="payment_method_momo"><img
                                                        src="{{ asset('frontend/assets/images/logo-momo-png.png') }}"
                                                        alt=""></label>
                                            </div>
                                            {{-- <div class="payment_method_item radio-item d-flex align-items-center">
                                                <input type="radio" name="payment_method" id="payment_method_zaloPay"
                                                    value="zaloPay">
                                                <label for="payment_method_zaloPay"><img
                                                        src="{{ asset('frontend/assets/images/Logo ZaloPay Square.png') }}"
                                                        alt=""></label>
                                            </div> --}}
                                            <div class="payment_method_item radio-item d-flex align-items-center">
                                                <input type="radio" name="payment_method" id="payment_method_vnPay"
                                                    value="vnPay">
                                                <label for="payment_method_vnPay"><img
                                                        src="{{ asset('frontend/assets/images/Icon VNPAY-QR.png') }}"
                                                        alt=""></label>
                                            </div>
                                            <div class="payment_method_item radio-item d-flex align-items-center">
                                                <input type="radio" name="payment_method" id="payment_method_payPal"
                                                    value="payPal">
                                                <label for="payment_method_payPal"><img
                                                        src="{{ asset('frontend/assets/images/Paypal_logo_PNG2.png') }}"
                                                        alt=""></label>
                                            </div>
                                            <div class="col-12 userInput">
                                                <input type="hidden" name="username" id="usernameInputHiden"
                                                    value="{{ @Auth::user()->name }}">
                                                <input type="hidden" name="phone" id="phoneInputHiden"
                                                    value="{!! @Auth::user()->phone !!}">
                                                <input type="hidden" name="email" id="emailInputHiden"
                                                    value="{!! @Auth::user()->email !!}">
                                            </div>
                                            <div class="action_payment_method d-flex justify-content-between">
                                                <a href="{{ route('home') }}" class="btn"><i
                                                        class="fas fa-home-lg fa-fw"></i>&nbsp; &nbsp; Mua Tiếp</a>
                                                <button type="submit" class="btn" id="submitCheckoutBtn">Thanh Toán
                                                    &nbsp; &nbsp; <i class="fas fa-fast-forward"></i></button>
                                            </div>
                                        </form>
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
                let qty = parseInt($(this).siblings('.cart_container_item_qty').val()) + 1;

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
                            calculateCouponDiscount()
                            toastr.success(response.message);
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
            // ? Get Value of Fullname
            $('#fullname').on('focusout', function() {
                let fullname = $(this).val();
                $('#usernameInputHiden').val(fullname);
            })
            // ? Get Value of Phone
            $('#phone').on('focusout', function() {
                let phone = $(this).val();
                $('#phoneInputHiden').val(phone);
            })
            // ? Get Value of Email
            $('#email').on('focusout', function() {
                let email = $(this).val();
                $('#emailInputHiden').val(email);
            })
            // ? Submit Checkout
            $('#submitCheckoutBtn').on('click', function(e) {
                e.preventDefault();
                if ($('input[name="payment_method"]:checked').length == 0) {
                    return toastr.error('Vui lòng chọn phương thức thanh toán');
                } else if ($('#fullname').val() == '') {
                    return toastr.error('Vui lòng nhập họ và tên');
                } else if ($('#phone').val() == '') {
                    return toastr.error('Vui lòng nhập số điện thoại');
                } else if ($('#email').val() == '') {
                    return toastr.error('Vui lòng nhập email');
                } else {
                    $.ajax({
                        method: 'POST',
                        url: "{{ route('checkout.formSubmit') }}",
                        data: $('#formCheckout').serialize(),
                        beforeSend: function() {
                            $('#submitCheckoutBtn').prop('disabled', true);
                            $('#submitCheckoutBtn').html(
                                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Đang Thanh Toán...'
                            );
                        },
                        success: function(data) {
                            window.location.href = data.url;
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr);
                        }
                    })
                }
            })
        });
    </script>
@endpush
