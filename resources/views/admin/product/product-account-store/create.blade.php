@extends('admin.layouts.master');

@section('content')
    <div class="main-content app-content">
        <div class="container-fluid">

            <!-- PAGE-HEADER -->
            <div class="page-header">
                <h1 class="page-title my-auto">Thêm Variant: {!! $product->name !!}</h1>
                <div>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item">
                            <a href="javascript:void(0)">Ecommerce</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Thêm Variant: {!! $product->name !!}</li>
                    </ol>
                </div>
            </div>
            <!-- PAGE-HEADER END -->
            <!-- Start::row-1 -->
            <div class="row">
                <div class="col-xl-12">
                    <div class="card custom-card">
                        <div class="card-body add-products p-0">
                            <form id="formAccount" action="{{ route('admin.product-account-store.store') }}" method="POST">
                                @csrf
                                <div class="px-4 py-3 border-top border-block-start-dashed d-sm-flex justify-content-end">
                                    {{-- THÊM HOẶC XÓA BẢNG --}}
                                    <div id="actionButtonTable"
                                        style="margin-right: 10px; padding-right: 10px; border-right: 1px solid gray">
                                        <div class="addRowTable btn btn-primary-gradient btn-wave waves-effect waves-light m-1"
                                            id="addRowTable"><i class="fal fa-plus"></i> &nbsp; Thêm Form Nhập
                                        </div>
                                        <div class="deleteRowTable btn btn-danger-gradient btn-wave waves-effect waves-light m-1"
                                            id="deleteRowTable"><i class="fal fa-trash"></i> &nbsp; Xóa Form Nhập</div>
                                    </div>

                                    <a href="{{ route('admin.product-account-store.index', ['product' => $product->id]) }}"
                                        class="btn btn-danger-gradient btn-wave waves-effect waves-light m-1"><i
                                            class="fal fa-undo"></i> &nbsp; Hủy</a>
                                    <button id="submitAccount" type="submit"
                                        class="submitAccount btn btn-primary-gradient btn-wave waves-effect waves-light m-1">Thêm
                                        Mới &nbsp; <i class="fas fa-save"></i></button>
                                </div>
                                <div class="p-4">
                                    <div class="row gx-5">
                                        <div class="col-12">
                                            <div class="card custom-card shadow-none mb-0 border-0">
                                                <div class="card-body p-0">
                                                    <div class="row gy-3" id="insideFormDemo">
                                                        {{-- NAME --}}
                                                        @if ($product->type == 'Tài Khoản')
                                                            <div id="formDemo">
                                                                <div class="col-xl-12">
                                                                    <label for="product-username-add" class="form-label">Tài
                                                                        Khoản</label>
                                                                    <input type="text" class="form-control"
                                                                        id="product-username-add" placeholder="Tài Khoản"
                                                                        name="username[]" value="{{ old('username') }}"
                                                                        required>
                                                                </div>
                                                                <div class="col-xl-12">
                                                                    <label for="product-password-add" class="form-label">Mật
                                                                        Khẩu</label>
                                                                    <input type="password" class="form-control"
                                                                        id="product-password-add" placeholder="Mật Khẩu"
                                                                        name="password[]" value="{{ old('password') }}"
                                                                        required>
                                                                </div>
                                                            </div>
                                                        @elseif($product->type == 'Key')
                                                            <div id="formDemo">
                                                                <div class="col-xl-12">
                                                                    <label for="product-code-add" class="form-label">KEY
                                                                        CODE</label>
                                                                    <input type="text" class="form-control"
                                                                        id="product-code-add"
                                                                        placeholder="VD: ABCD-EFGH-IJKL-MNOP" name="code[]"
                                                                        value="{{ old('code') }}" required>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    </div>
                                                    <div class="col-xl-12">
                                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="px-4 py-3 border-top border-block-start-dashed d-sm-flex justify-content-end">
                                    {{-- THÊM HOẶC XÓA BẢNG --}}
                                    <div id="actionButtonTable"
                                        style="margin-right: 10px; padding-right: 10px; border-right: 1px solid gray">
                                        <div class="addRowTable btn btn-primary-gradient btn-wave waves-effect waves-light m-1"
                                            id="addRowTable"><i class="fal fa-plus"></i> &nbsp; Thêm Form Nhập
                                        </div>
                                        <div class="deleteRowTable btn btn-danger-gradient btn-wave waves-effect waves-light m-1"
                                            id="deleteRowTable"><i class="fal fa-trash"></i> &nbsp; Xóa Form Nhập</div>
                                    </div>

                                    <a href="{{ route('admin.product-account-store.index', ['product' => $product->id]) }}"
                                        class="btn btn-danger-gradient btn-wave waves-effect waves-light m-1"><i
                                            class="fal fa-undo"></i> &nbsp; Hủy</a>
                                    <button id="submitAccount" type="submit"
                                        class="submitAccount btn btn-primary-gradient btn-wave waves-effect waves-light m-1">Thêm
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

@push('scripts')
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            // ? Kiểm tra xem trường username, password và code có rỗng không
            $('#submitAccount').on('click', function(e) {
                e.preventDefault();
                // ? Lấy đường link route của form
                var url = $('#formAccount').attr('action');
                // ? Kiểm tra xem trường username, password và code có rỗng không
                if ($('#product-username-add').val() == '' || $('#product-password-add').val() == '' || $(
                        '#product-code-add').val() == '') {
                    toastr.error('Vui lòng nhập đầy đủ thông tin');
                    return false;
                } else {
                    // ? Nếu không rỗng thì submit form
                    $.ajax({
                        type: 'POST',
                        url: url,
                        data: $('#formAccount').serialize(),
                        beforeSend: function() {
                            $('.submitAccount').prop('disabled', true);
                            $('.submitAccount').html(
                                '<i class="fas fa-spinner fa-spin"></i> Đang xử lý...')
                        },
                        success: function(response) {
                            toastr.success(response.message);
                            // ? Xóa dữ liệu trong form
                            $('#formAccount').trigger('reset');
                        },
                        error: function(response) {
                            toastr.error(response.responseJSON.message);
                        },
                        complete: function() {
                            $('.submitAccount').prop('disabled', false);
                            $('.submitAccount').html(
                                'Thêm Mới &nbsp; <i class="fas fa-save"></i>')
                        }
                    })
                }
            })
            // ? Cứ mỗi 4 ký tự nhập vào form product-code-add thì sẽ thêm dấu - vào ngoại trừ ký tự cuối cùng VÀ ký tự đầu tiên và tự động uppercase
            // ? Vì có nhiều id product-code-add nên phải trỏ tới id insideFormDemo để lấy giá trị và thêm sự kiện trên
            $('#insideFormDemo').on('keyup', '#product-code-add', function() {
                var value = $(this).val();
                var value = value.toUpperCase();
                var value = value.replace(/[^A-Z0-9]/g, '');
                var value = value.match(new RegExp('.{1,4}', 'g')).join('-');
                $(this).val(value);
            })

            // ? Thêm form nhập khi click vào addRowTable sẽ thêm form nhập lấy từ id formDemo
            $('#formAccount').on('click', '.addRowTable', function() {
                $('#formDemo').clone().appendTo('#insideFormDemo');
            })

            // ? Xóa form nhập khi click vào deleteRowTable sẽ xóa form nhập cuối cùng
            $('.deleteRowTable').on('click', function() {
                // ? Nếu form  #formDemo còn 1 thì không thể xóa
                if ($('#insideFormDemo').children().length == 1) {
                    toastr.error('Không thể xóa');
                    return false;
                }
                $('#insideFormDemo').children().last().remove();
            })
        })
    </script>
@endpush
