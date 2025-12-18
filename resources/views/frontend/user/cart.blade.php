@extends('frontend.layouts.master')

@section('content')
    <main>
        <div class="container profile_user my-5">
            <div class="user-items">
                @include('frontend.user.sidebar.sidebar')
                <div class="user-right">
                    <div class="user-right__items">
                        <h1>Lịch sử đơn hàng</h1>
                        <p>
                            Hiển thị thông tin các sản phẩm bạn đã mua tại
                            Divine Shop
                        </p>
                        <div class="lineX"></div>
                        <div class="oders-search-items">
                            <div class="oders-table-item ">
                                <table class="col-12">
                                    <thead>
                                        <tr>
                                            <th>Thời gian</th>
                                            <th>Mã đơn hàng</th>
                                            <th>Sản phẩm</th>
                                            <th>Tổng tiền</th>
                                            <th>Trạng thái</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($userProducts as $userProduct)
                                            <tr id="order1" class="order">
                                                <td>{{ $userProduct->created_at }}</td>
                                                <td>{{ $userProduct->invoice_id }}</td>
                                                <td>
                                                    @foreach ($userProduct->orderProducts as $orderProduct)
                                                        <div class="product-item">
                                                            <div class="product-name">
                                                                {{ $orderProduct->product_name }}
                                                            </div>
                                                            <div class="product-quantity">
                                                                x{{ $orderProduct->quantity }}
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </td>
                                                <td>{{ formatPrice($orderProduct->product_price * $orderProduct->quantity) }}
                                                </td>
                                                <td>{!! $userProduct->order_status == 1 ? "<p class='text-success'>Đã Xử Lý</p>" : "<p class='text-dander'>Chưa Xử Lý</p>" !!}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
