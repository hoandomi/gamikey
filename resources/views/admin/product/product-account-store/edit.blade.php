@extends('admin.layouts.master');

@section('content')
    <div class="main-content app-content">
        <div class="container-fluid">

            <!-- PAGE-HEADER -->
            <div class="page-header">
                <h1 class="page-title my-auto">Sửa Tài Khoản: {!! $product->product->name !!}</h1>
                <div>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item">
                            <a href="javascript:void(0)">Ecommerce</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Sửa Tài Khoản: {!! $product->product->name !!}</li>
                    </ol>
                </div>
            </div>
            <!-- PAGE-HEADER END -->
            <!-- Start::row-1 -->
            <div class="row">
                <div class="col-xl-12">
                    <div class="card custom-card">
                        <div class="card-body add-products p-0">
                            <form id="formAccount" action="{{ route('admin.product-account-store.update', $product->id) }}"
                                method="POST">
                                @csrf
                                @method('PUT')
                                <div class="p-4">
                                    <div class="row gx-5">
                                        <div class="col-12">
                                            <div class="card custom-card shadow-none mb-0 border-0">
                                                <div class="card-body p-0">
                                                    <div class="row gy-3" id="insideFormDemo">
                                                        {{-- NAME --}}
                                                        @if ($product->code == '')
                                                            <div id="formDemo">
                                                                <div class="col-xl-12">
                                                                    <label for="product-username-add" class="form-label">Tài
                                                                        Khoản</label>
                                                                    <input type="text" class="form-control"
                                                                        id="product-username-add" placeholder="Tài Khoản"
                                                                        name="username" value="{{ $product->username }}"
                                                                        required>
                                                                </div>
                                                                <div class="col-xl-12">
                                                                    <label for="product-password-add" class="form-label">Mật
                                                                        Khẩu</label>
                                                                    <input type="password" class="form-control"
                                                                        id="product-password-add" placeholder="Mật Khẩu"
                                                                        name="password" value="{{ $product->password }}"
                                                                        required>
                                                                </div>
                                                            </div>
                                                        @elseif($product->code != '')
                                                            <div id="formDemo">
                                                                <div class="col-xl-12">
                                                                    <label for="product-code-add" class="form-label">KEY
                                                                        CODE</label>
                                                                    <input type="text" class="form-control"
                                                                        id="product-code-add"
                                                                        placeholder="VD: ABCD-EFGH-IJKL-MNOP" name="code"
                                                                        value="{{ $product->code }}" required>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="px-4 py-3 border-top border-block-start-dashed d-sm-flex justify-content-end">

                                    <a href="{{ route('admin.product-account-store.index', ['product' => $product->product_id]) }}"
                                        class="btn btn-danger-gradient btn-wave waves-effect waves-light m-1"><i
                                            class="fal fa-undo"></i> &nbsp; Hủy</a>
                                    <button id="submitAccount" type="submit"
                                        class="btn btn-primary-gradient btn-wave waves-effect waves-light m-1">Cập Nhật &nbsp; <i class="fas fa-save"></i></button>
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
            // ? Cứ mỗi 4 ký tự nhập vào form product-code-add thì sẽ thêm dấu - vào ngoại trừ ký tự cuối cùng VÀ ký tự đầu tiên và tự động uppercase
            // ? Vì có nhiều id product-code-add nên phải trỏ tới id insideFormDemo để lấy giá trị và thêm sự kiện trên
            $('#insideFormDemo').on('keyup', '#product-code-add', function() {
                var value = $(this).val();
                var value = value.toUpperCase();
                var value = value.replace(/[^A-Z0-9]/g, '');
                var value = value.match(new RegExp('.{1,4}', 'g')).join('-');
                $(this).val(value);
            })
        })
    </script>
@endpush
