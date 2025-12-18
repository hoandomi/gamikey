<div class="user-left">
    <div class="user_left__items">
        <div class="user_left__item {{ request()->is('profile') ? 'active' : '' }}">
            <a href="{{ route('profile') }}">
                <div>
                    <i class="fas fa-user"></i>
                </div>
                <p>Tài khoản</p>
            </a>
        </div>
        <div class="user_left__item {{ request()->is('profile-cart-history') ? 'active' : '' }}">
            <a href="{{ route('profile-cart-history') }}">
                <div>
                    <i class="fas fa-shopping-cart"></i>
                </div>
                <p>Lịch sử đơn hàng</p>
            </a>
        </div>
        <div class="user_left__item {{ request()->is('profile-password') ? 'active' : '' }}">
            <a href="{{ route('profile-password') }}">
                <div>
                    <i class="fas fa-user-lock"></i>
                </div>
                <p>Mật khẩu và bảo mật</p>
            </a>
        </div>
        <div class="user_left__item {{ request()->is('profile-comment') ? 'active' : '' }}">
            <a href="{{ route('profile-comment') }}">
                <div>
                    <i class="fas fa-comment"></i>
                </div>
                <p>Bình luận của tôi</p>
            </a>
        </div>

    </div>
</div>
