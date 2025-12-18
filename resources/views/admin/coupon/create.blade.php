@extends('admin.layouts.master');

@section('content')
    <div class="main-content app-content">
        <div class="container-fluid">

            <!-- PAGE-HEADER -->
            <div class="page-header">
                <h1 class="page-title my-auto">Thêm Danh Mục</h1>
                <div>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item">
                            <a href="javascript:void(0)">Ecommerce</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Thêm Danh Mục</li>
                    </ol>
                </div>
            </div>
            <!-- PAGE-HEADER END -->


            <!-- Start::row-1 -->
            <div class="row">
                <div class="col-xl-12">
                    <div class="card custom-card">
                        <div class="card-body add-products p-0">
                            <form action="{{ route('admin.coupon.store') }}" method="POST">
                                @csrf
                                <div class="p-4">
                                    <div class="row gx-5">
                                        <div class="col-12">
                                            <div class="card custom-card shadow-none mb-0 border-0">
                                                <div class="card-body p-0">
                                                    <div class="row gy-3">
                                                        {{-- NAME --}}
                                                        <div class="col-xl-6">
                                                            <label for="product-name-add" class="form-label">Tên Mã Giảm
                                                                Giá</label>
                                                            <input type="text" class="form-control" id="product-name-add"
                                                                placeholder="Tên Mã Giảm Giá" name="name"
                                                                value="{{ old('name') }}">
                                                        </div>
                                                        {{-- CODE --}}
                                                        <div class="col-xl-6">
                                                            <label for="product-code-add" class="form-label">CODE</label>
                                                            <input type="text" class="form-control" id="product-code-add"
                                                                placeholder="MÃ CODE VD:(FLASHSALENEWYEARS)" name="code"
                                                                value="{{ old('code') }}">
                                                        </div>
                                                        {{-- MAX USE --}}
                                                        <div class="col-xl-6">
                                                            <label for="product-max-use-add" class="form-label">Tối đa sử
                                                                dụng</label>
                                                            <input type="number" class="form-control"
                                                                id="product-max-use-add"
                                                                placeholder="Một người dùng được sử dụng bao nhiêu lần"
                                                                name="max_use" value="{{ old('max_use') }}">
                                                        </div>
                                                        {{-- QUANTITY --}}
                                                        <div class="col-xl-6">
                                                            <label for="product-qty-add" class="form-label">Số Lượng</label>
                                                            <input type="number" class="form-control"
                                                                id="product-qty-addadd" placeholder="Số Lượng"
                                                                name="quantity" value="{{ old('quantity') }}">
                                                        </div>
                                                        {{-- Gía trị giảm giá --}}
                                                        <div class="col-xl-6">
                                                            <label for="product-discount-value-type-add"
                                                                class="form-label">Giá
                                                                trị giảm</label>
                                                            <input type="number" class="form-control"
                                                                id="product-discount-value-type-add"
                                                                placeholder="Giá trị giảm" name="discount"
                                                                value="{{ old('discount') }}">
                                                        </div>
                                                        {{-- Kiểu Giảm giá --}}
                                                        <div class="col-xl-6">
                                                            <label for="product-discount-type-add" class="form-label">Kiểu
                                                                Giảm Giá</label>
                                                            <select class="form-select" aria-label="Default select example"
                                                                name="discount_type">
                                                                <option value="">Chọn Kiểu Giảm Giá</option>
                                                                <option
                                                                    {{ old('discount_type') === 'percent' ? 'selected' : '' }}
                                                                    value="percent">Phần Trăm (%)</option>
                                                                <option
                                                                    {{ old('discount_type') === 'price' ? 'selected' : '' }}
                                                                    value="price">Giá Tiền (VND)</option>
                                                            </select>
                                                        </div>
                                                        {{-- START DATE --}}
                                                        <div class="col-xl-6">
                                                            <div class="col-xl-12">
                                                                <label for="product-start-date-add" class="form-label">Ngày
                                                                    Bắt
                                                                    Đầu</label>
                                                                <input type="date" class="form-control" id="datetime"
                                                                    name="start_date" value="{{ old('start_date') }}">
                                                            </div>
                                                        </div>
                                                        {{-- END DATE --}}
                                                        <div class="col-xl-6">
                                                            <div class="col-xl-12">
                                                                <label for="product-end-date-add" class="form-label">Ngày
                                                                    Kết
                                                                    Thúc</label>
                                                                <input type="date" class="form-control" id="datetime"
                                                                    name="end_date" value="{{ old('end_date') }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-12">
                                                            <label for="product-tags" class="form-label">Trạng Thái</label>
                                                            <select class="form-select" aria-label="Default select example"
                                                                name="status">
                                                                <option value="">Chọn Trạng Thái</option>
                                                                <option {{ old('status') === 0 ? 'selected' : '' }}
                                                                    value="0">Ẩn</option>
                                                                <option selected
                                                                    {{ old('status') === 1 ? 'selected' : '' }}
                                                                    value="1">Hiện</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="px-4 py-3 border-top border-block-start-dashed d-sm-flex justify-content-end">
                                    <a href="{{ route('admin.coupon.index') }}"
                                        class="btn btn-danger-gradient btn-wave waves-effect waves-light m-1"><i
                                            class="fal fa-undo"></i> &nbsp; Hủy</a>
                                    <button type="submit"
                                        class="btn btn-primary-gradient btn-wave waves-effect waves-light m-1">Thêm
                                        Mới &nbsp; <i class="fas fa-save"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--End::row-1 -->

        </div>
    </div>
@endsection
