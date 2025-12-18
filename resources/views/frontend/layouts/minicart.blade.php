<div class="mini_cart">
    <h4>Giỏ Hàng <span class="close_mini_cart"><i class="far fa-times"></i></span></h4>
    <ul class="mini_cart_wrapper">
        @if (Cart::count() > 0)
            @foreach (Cart::content() as $item)
                <li>
                    <div class="mini_cart_img">
                        <a href="{{ route('products.show', $item->options->slug) }}">
                            <img src="{{ asset($item->options->image) }}" alt="">
                        </a>
                        <div data-id="{{ $item->rowId }}" class="mini_cart_mini_icon_remove_product" href="">
                            <i class="fas fa-minus-circle" aria-hidden="true"></i>
                        </div>
                    </div>
                    <div class="mini_cart_text">
                        <a class="mini_cart_title_anchor" href="">{!! $item->name !!}</a>
                        <p class="mini_cart_price">{{ formatPrice($item->price) }}</p>
                        <small class="mini_cart_qty">Số Lượng: <span>{{ $item->qty }}</span></small>
                    </div>
                </li>
            @endforeach
        @else
            <li>
                <p class="text-center">Không có sản phẩm nào trong giỏ hàng</p>
            </li>
        @endif
    </ul>
    <div class="mini_cart_actions">
        <h5>Tạm Tính: <span class="mini_cart_subtotal">{{ formatPrice(Cart::priceTotal()) }}</span></h5>
        <div class="mini_cart_action_area d-flex justify-content-between align-items-center">
            <a href="{{ route('cart.index') }}" class="common_btn">Xem Giỏ Hàng</a>
            <a href="{{ route('checkout') }}" class="common_btn">Thanh Toán</a>
        </div>
    </div>

</div>
