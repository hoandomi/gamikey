@extends('admin.layouts.master')

@section('content')
    <!-- Start::app-content -->
    <div class="main-content app-content">
        <div class="container-fluid">

            <!-- PAGE-HEADER -->
            <div class="page-header">
                <h1 class="page-title my-auto">Chi Tiết Đơn Hàng</h1>
                <div>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item">
                            <a href="javascript:void(0)">Ecommerce</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Chi Tiết Đơn Hàng</li>
                    </ol>
                </div>
            </div>
            <!-- PAGE-HEADER END -->

            <div class="page-header d-flex justify-content-between">
                <a href="{{route('admin.order.index')}}" class="btn btn-primary btn-wave waves-effect waves-light">
                    Trở Lại</a>
            </div>
            <!-- Start::row-1 -->
            <div class="row" id="bodyToPrint">
                <div class="col-xl-8">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="card custom-card">
                                        <div class="card-header d-flex justify-content-between">
                                            <div class="card-title">
                                                Order ID - <span class="text-primary">#{{ $orders->invoice_id }}</span>
                                            </div>
                                        </div>
                                        <div class="card-body p-0">
                                            <div class="table-responsive">
                                                <table class="table text-nowrap">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">Sản Phẩm</th>
                                                            <th scope="col">Price</th>
                                                            <th scope="col">Quantity</th>
                                                            <th scope="col">Total Price</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($orderProducts as $orderProduct)
                                                            <tr>
                                                                <td>
                                                                    <div class="d-flex align-items-center">
                                                                        <div class="me-3 lh-1">
                                                                            <span class="avatar avatar-xxl bd-gray-200">
                                                                                <img src="{{ asset($orderProduct->product->image) }}"
                                                                                    alt="">
                                                                            </span>
                                                                        </div>
                                                                        <div>
                                                                            <div class="mb-1 fs-14 fw-semibold">
                                                                                <a target="_blank"
                                                                                    href="{{ route('products.show', $orderProduct->product->slug) }}">{{ limitText($orderProduct->product->name, 50) }}</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <span
                                                                        class="fs-15 fw-semibold">{{ formatPrice($orderProduct->product_price) }}</span>
                                                                </td>
                                                                <td class="">{{ $orderProduct->quantity }}</td>
                                                                <td>
                                                                    <span
                                                                        class="fs-15 fw-semibold">{{ formatPrice($orderProduct->product_price * $orderProduct->quantity) }}</span>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="card-footer border-top-0">
                                            <div class="btn-list float-end">
                                                <button id="print" type="button"
                                                    class="d-inline-flex btn btn-primary btn-wave"><i
                                                        class="ri-printer-line me-1 align-middle"></i>Print</button>
                                                <button type="button" class="d-inline-flex btn btn-secondary btn-wave"><i
                                                        class="ri-share-forward-line me-1 align-middle"></i>Share
                                                    Details</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <div class="row">
                                <div class="col-xl-4">
                                    <div class="card custom-card">
                                        <div class="card-header">
                                            <div class="card-title">
                                                Chi Tiết Khách Hàng
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <ul class="list-unstyled order-details-list">
                                                <li>
                                                    <div class="fs-14 text-muted d-flex">
                                                        <p class="me-2 text-default fw-semibold">Tên : </p>
                                                        <span class="text-primary">{{ $orders->customer_name }}</span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="fs-14 text-muted d-flex">
                                                        <p class="me-2 text-default fw-semibold">Email : </p><a
                                                            href="javascript:void(0);"
                                                            class="text-primary">{{ $orders->customer_email }}</a>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="fs-14 text-mute d-flex text-primary">
                                                        <p class="me-2 text-default fw-semibold">Phone :
                                                        </p>{{ $orders->customer_phone }}
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="card custom-card overflow-hidden">
                                        <div class="card-header">
                                            <div class="card-title">
                                                Phương Thức Thanh Toán
                                            </div>
                                        </div>
                                        <div class="card-body p-0">
                                            <div class="p-3">
                                                <div class="mb-3">
                                                    <span class="fs-15 fw-semibold">Transactions ID : <span
                                                            class="text-primary">{{ $transaction->transaction_id }}</span></span>
                                                </div>
                                                <ul class="list-unstyled order-details-list">
                                                    <li>
                                                        <div class="fs-14 text-primary"><span
                                                                class="me-2 text-default fw-semibold">Phương Thức Thanh Toán
                                                                : </span>{{ $transaction->payment_method }}</div>
                                                    </li>
                                                    <li>
                                                        <div class="fs-14 text-primary"><span
                                                                class="me-2 text-default fw-semibold">Tổng Tiền(VND) :
                                                            </span>{{ $transaction->amount }}</div>
                                                    </li>
                                                    <li>
                                                        <div class="fs-14 text-primary"><span
                                                                class="me-2 text-default fw-semibold">Tổng
                                                                Tiền({{ $transaction->amount_currency_name }})
                                                                : </span>{{ $transaction->amount_real_currency }}
                                                            {{ $transaction->amount_currency_name }}</div>
                                                    </li>

                                                </ul>
                                            </div>
                                            <div class="alert alert-success d-flex align-items-center rounded-0 shadow-none"
                                                role="alert">
                                                <svg class="flex-shrink-0 me-2 svg-success"
                                                    xmlns="http://www.w3.org/2000/svg" height="1.5rem" viewBox="0 0 24 24"
                                                    width="1.5rem" fill="#000000">
                                                    <path d="M0 0h24v24H0V0zm0 0h24v24H0V0z" fill="none"></path>
                                                    <path
                                                        d="M16.59 7.58L10 14.17l-3.59-3.58L5 12l5 5 8-8zM12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8z">
                                                    </path>
                                                </svg>
                                                <div>
                                                    <strong>Shipping address</strong> is same as billing address
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="card custom-card">
                        <div class="card-header">
                            <div class="card-title">
                                Tóm Tắt Thanh Toán
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="">
                                <div class="d-flex align-items-center justify-content-between mb-3">
                                    <div class=" fs-14">Tổng Sản Phẩm</div>
                                    <div class="fw-semibold fs-16">{{ $orders->product_quantity }}</div>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mb-3">
                                    <div class=" fs-14">Tổng Giá Trị Sản phẩm</div>
                                    <div class="fw-semibold fs-16">{{ formatPrice($orders->sub_total) }}</div>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mb-3">
                                    <div class=" fs-14">Mã Giảm Giá</div>
                                    @php
                                        $codes = json_decode($orders->coupon, true);
                                        $code = $codes['code'];
                                        $type = $codes['discount_type'];
                                        $discount = $codes['discount'];
                                    @endphp
                                    <div class="badge bg-success-transparent fs-11">{{ $code }}</div>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mb-3">
                                    <div class=" fs-14">Giảm Giá</div>
                                    <div class="fw-semibold fs-16 text-success">
                                        - {{ $type == 'percent' ? $discount . '%' : formatPrice($code['discount']) }} | -
                                        {{ formatPrice($orders->discount_amount) }}
                                    </div>
                                </div>
                                {{-- <div class="d-flex align-items-center justify-content-between mb-3">
                                    <div class=" fs-14">Delivery Charges</div>
                                    <div class="fw-semibold fs-16 text-danger">-$150</div>
                                </div>
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class=" fs-14">Service Tax (18%)</div>
                                    <div class="fw-semibold fs-16">- $45.029</div>
                                </div> --}}
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="fs-18 fw-semibold">Tổng Tiền</div>
                                <h4 class="fw-semibold">{{ formatPrice($orders->total_amount) }}</h4>
                            </div>
                        </div>
                    </div>
                    <div class="card custom-card">
                        <div class="card-header">
                            <div class="card-title">
                                Trạng Thái
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <div class=" fs-14">Trạng Thái Đơn Hàng:</div>
                                <div class="custom-toggle-switch d-flex align-items-center my-4">
                                    <input data-id="{{ $orders->id }}" id="toggleswitchPrimary_{{ $orders->id }}"
                                        class="toggleswitchStatus" name="toggleswitch001" type="checkbox"
                                        {{ $orders->order_status == 1 ? 'checked' : '' }}>
                                    <label for="toggleswitchPrimary_{{ $orders->id }}"
                                        class="label-primary"></label><span class="ms-3"></span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <div class=" fs-14">Trạng Thái Thanh Toán:</div>
                                @if ($orders->payment_status == 1)
                                    <div class="fw-semibold fs-16 text-success">Đã Thanh Toán</div>
                                @else
                                    <div class="fw-semibold fs-16 text-danger">Chưa Thanh Toán</div>
                                @endif
                            </div>
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <div class=" fs-14">Ngày Đặt Hàng:</div>
                                <div class="fw-semibold fs-16 text-success">{{ $orders->created_at }}</div>
                            </div>

                        </div>
                    </div>
                    {{--  <div class="card custom-card">
                        <div class="card-header">
                            <div class="card-title">
                                Tài Khoản
                            </div>
                        </div>
                        <div class="card-body">
                            @foreach ($oderProductAccounts as $oderProductAccount)
                                @if ($oderProductAccount->username != null)
                                    <div class="d-flex align-items-center mb-3">
                                        @php
                                            $productId = $oderProductAccount->product_id;
                                            $productName = App\Models\Product::where('id', $productId)->first()->name;
                                        @endphp
                                        <div class="card-header" style="padding: 10px 0px; margin: 10px 0px;">
                                            <div class="card-title text-primary">
                                                {{ $productName }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between mb-3">
                                        <div class=" fs-14">Tài Khoản:</div>
                                        <div class="fw-semibold fs-16 text-success">{{ $oderProductAccount->username }}
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between mb-3">
                                        <div class=" fs-14">Mật Khẩu:</div>
                                        <div class="fw-semibold fs-16 text-success">{{ $oderProductAccount->password }}
                                        </div>
                                    </div>
                                @else
                                    @php
                                        $productId = $oderProductAccount->product_id;
                                        $productName = App\Models\Product::where('id', $productId)->first()->name;
                                    @endphp
                                    <div class="card-header" style="padding: 10px 0px; margin: 10px 0px;">
                                        <div class="card-title text-primary">
                                            {{ $productName }}
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between mb-3">
                                        <div class=" fs-14">CODE:</div>
                                        <div class="fw-semibold fs-16 text-success">{{ $oderProductAccount->code }}</div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div> --}}
                </div>
            </div>
            <!--End::row-1 -->
        </div>
    </div>
    <!-- End::app-content -->
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#print').click(function() {
                var printContents = document.getElementById('bodyToPrint').innerHTML;
                var originalContents = document.body.innerHTML;
                document.body.innerHTML = printContents;
                window.print();
                document.body.innerHTML = originalContents;
            });

            // ? ChangeStatus
            $('body').on('click', '.toggleswitchStatus', function() {
                let id = $(this).data('id');

                $.ajax({
                    type: "PUT",
                    data: {
                        id: id
                    },
                    url: "{{ route('admin.order.change-status') }}",
                    // ? Before send loading screen
                    beforeSend: function() {
                        $('#loader').removeClass('d-none').css('display', 'flex');
                    },
                    success: function(data) {
                        toastr.success(data.message);
                        $('#loader').addClass('d-none').css('display', 'none');
                    },
                    error: function(xhr, status, error) {
                        toastr.error('Có lỗi xảy ra, vui lòng thử lại sau');
                        $('#loader').addClass('d-none').css('display', 'none');
                    }
                })
            });
        });
    </script>
@endpush
