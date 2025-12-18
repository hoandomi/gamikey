@extends('admin.layouts.master');

@section('content')
    <div class="main-content app-content">
        <div class="container-fluid">
            <!-- PAGE-HEADER -->
            <div class="page-header">
                <h1 class="page-title my-auto">Sửa Khách Hàng: {{ $user->name }}</h1>
                <div>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item">
                            <a href="javascript:void(0)">Ecommerce</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Sửa Khách Hàng</li>
                    </ol>
                </div>
            </div>
            <!-- PAGE-HEADER END -->
            {{-- USER INFO --}}

            <!-- Start::row-1 -->
            <div class="row">
                <div class="col-xl-12">
                    <div class="card custom-card">
                        <div class="card-body add-products p-0">
                            <form action="{{ route('admin.user.update', $user->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="p-4">
                                    <div class="row gx-5">
                                        <div class="col-xxl-8 col-xl-12 col-lg-12 col-md-8">
                                            <div class="card custom-card shadow-none mb-0 border-0">
                                                <div class="card-body p-0">
                                                    <div class="row gy-3">
                                                        {{-- IMAGE --}}
                                                        <div class="col-xl-12">
                                                            <label for="formFile" class="form-label">Ảnh Khách Hàng</label>
                                                            <input class="form-control" type="file" id="formFile"
                                                                name="image">
                                                            <input type="hidden" name="oldImage"
                                                                value="{{ $user->image }}">
                                                        </div>
                                                        {{-- NAME --}}
                                                        <div class="col-xl-12">
                                                            <label for="product-name-add" class="form-label">Tên Khách
                                                                Hàng</label>
                                                            <input type="text" class="form-control" id="product-name-add"
                                                                placeholder="Tên Khách Hàng" name="name"
                                                                value="{{ $user->name }}">
                                                        </div>
                                                        {{-- Email --}}
                                                        <div class="col-xl-6">
                                                            <label for="product-email-add" class="form-label">Email</label>
                                                            <input type="email" class="form-control"
                                                                id="product-email-add" placeholder="Tên Khách Hàng"
                                                                name="email" value="{{ $user->email }}">
                                                        </div>
                                                        {{-- Email --}}
                                                        <div class="col-xl-6">
                                                            <label for="product-phone-add" class="form-label">Số Điện
                                                                Thoại</label>
                                                            <input type="tel" class="form-control"
                                                                id="product-phone-add" placeholder="Số Điện Thoại"
                                                                name="phone" value="{{ $user->phone }}">
                                                        </div>
                                                        {{-- ROLE --}}
                                                        <div class="col-xl-6">
                                                            <label for="product-tags" class="form-label">Vai Trò</label>
                                                            <select class="form-select" aria-label="Default select example"
                                                                name="role">
                                                                <option value="">Chọn Vai Trò</option>
                                                                <option {{ $user->role == 'user' ? 'selected' : '' }}
                                                                    value="user">User</option>
                                                                <option {{ $user->role == 'admin' ? 'selected' : '' }}
                                                                    value="admin">Admin</option>
                                                            </select>
                                                        </div>
                                                        {{-- STATUS --}}
                                                        <div class="col-xl-6">
                                                            <label for="product-tags" class="form-label">Trạng
                                                                Thái</label>
                                                            <select class="form-select" aria-label="Default select example"
                                                                name="status">
                                                                <option value="">Chọn Trạng Thái</option>
                                                                <option {{ $user->status === 0 ? 'selected' : '' }}
                                                                    value="0">Ẩn</option>
                                                                <option {{ $user->status === 1 ? 'selected' : '' }}
                                                                    value="1">Hiện</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xxl-4 col-xl-12 col-lg-12 col-md-4">
                                            <div class="card custom-card shadow-none mb-0 border-0">
                                                <div class="card-body p-0">
                                                    <div class="row gy-3">
                                                        <div class="text-center">
                                                            <img src="{{ $user->image }}" class="img-fluid rounded"
                                                                alt="...">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="px-4 py-4 border-top border-block-start-dashed d-sm-flex justify-content-end">
                                    <a href="{{ route('admin.user.index') }}"
                                        class="btn btn-danger-gradient btn-wave waves-effect waves-light m-1"><i
                                            class="fal fa-undo"></i> &nbsp; Hủy</a>
                                    <button type="submit"
                                        class="btn btn-primary-gradient btn-wave waves-effect waves-light m-1">Cập Nhật
                                        &nbsp; <i class="fas fa-save"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--End::row-1 -->

            <!-- PAGE-HEADER -->
            <div class="page-header">
                <h1 class="page-title my-auto">Quản Lý Mật Khẩu: {{ $user->name }}</h1>
                <div>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item">
                            <a href="javascript:void(0)">Ecommerce</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Quản Lý Mật Khẩu</li>
                    </ol>
                </div>
            </div>
            <!-- PAGE-HEADER END -->
            {{-- PASSWORD --}}
            <!-- Start::row-1 -->
            <div class="row">
                <div class="col-xl-12">
                    <div class="card custom-card">
                        <div class="card-body add-products p-0">
                            <form action="{{ route('admin.user.update-password', $user->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="p-4">
                                    <div class="row gx-5">
                                        <div class="col-xxl-8 col-xl-12 col-lg-12 col-md-8">
                                            <div class="card custom-card shadow-none mb-0 border-0">
                                                <div class="card-body p-0">
                                                    <div class="row gy-3">
                                                        {{-- OLD PASSWORD --}}
                                                        <div class="col-xl-12">
                                                            <label for="create-password"
                                                                class="form-label text-default">Mật Khẩu Cũ</label>
                                                            <div class="input-group">
                                                                <input type="password"
                                                                    class="form-control form-control-lg"
                                                                    id="create-password" placeholder="password"
                                                                    value="{{ $user->password }}" name="old_password">
                                                                <button aria-label="button" class="btn btn-light"
                                                                    type="button"
                                                                    onclick="createpassword('create-password')"><i
                                                                        class="ri-eye-off-line align-middle"></i></button>
                                                            </div>
                                                        </div>
                                                        {{-- NEW PASSWORD --}}
                                                        <div class="col-xl-12">
                                                            <label for="create-new-password"
                                                                class="form-label text-default">Mật Khẩu Mới</label>
                                                            <div class="input-group">
                                                                <input type="password"
                                                                    class="form-control form-control-lg"
                                                                    id="create-new-password" placeholder="password"
                                                                    name="new_password">
                                                                <button aria-label="button" class="btn btn-light"
                                                                    type="button" id="create-new-password-btn"><i
                                                                        class="ri-eye-off-line align-middle"></i></button>
                                                            </div>
                                                        </div>
                                                        {{-- CONFIRM PASSWORD --}}
                                                        <div class="col-xl-12">
                                                            <label for="create-confirm-password"
                                                                class="form-label text-default">Nhập Lại Mật Khẩu</label>
                                                            <div class="input-group">
                                                                <input type="password"
                                                                    class="form-control form-control-lg"
                                                                    id="create-confirm-password" placeholder="password"
                                                                    name="confirm_password">
                                                                <button aria-label="button" class="btn btn-light"
                                                                    type="button" id="create-confirm-password-btn"><i
                                                                        class="ri-eye-off-line align-middle"></i></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xxl-4 col-xl-12 col-lg-12 col-md-4">
                                            <div class="card custom-card shadow-none mb-0 border-0">
                                                <div class="card-body p-0">
                                                    <div class="row gy-3">
                                                        <div class="text-center">
                                                            <img src="{{ $user->image }}" class="img-fluid rounded"
                                                                alt="...">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="px-4 py-4 border-top border-block-start-dashed d-sm-flex justify-content-end">
                                    <a href="{{ route('admin.user.index') }}"
                                        class="btn btn-danger-gradient btn-wave waves-effect waves-light m-1"><i
                                            class="fal fa-undo"></i> &nbsp; Hủy</a>
                                    <button type="submit"
                                        class="btn btn-primary-gradient btn-wave waves-effect waves-light m-1">Cập Nhật
                                        &nbsp; <i class="fas fa-save"></i></button>
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
        $(document).ready(function(){$.ajaxSetup({headers:{"X-CSRF-TOKEN":$('meta[name="csrf-token"]').attr("content")}}),$("body").on("focusout","#editor",function(){let e=$(".ql-editor").html();$("input[name=long_description]").val(e)});for(let e=1;e<=4;e++)$("#select-container-"+e).select2();$("body").on("change",".categorySelectVal",function(){let e=$(this).val();$.ajax({type:"GET",data:{category_id:e},url:"{{ route('admin.product.getSubCategories') }}",success:function(e){$(".subCategorySelectVal").html('<option value="">Chọn Danh Mục</option>'),$.each(e,function(t,a){$(".subCategorySelectVal").append('<option value="'+a.id+'">'+a.name+"</option>"),console.log(e)})},error:function(e,t,a){console.log(e.responseText)}})}),$("body").on("click","#create-new-password-btn",function(){"password"===$("#create-new-password").attr("type")?($("#create-new-password").attr("type","text"),$("#create-new-password").next().html('<i class="ri-eye-line align-middle"></i>')):($("#create-new-password").attr("type","password"),$("#create-new-password").next().html('<i class="ri-eye-off-line align-middle"></i>'))}),$("body").on("click","#create-confirm-password-btn",function(){"password"===$("#create-confirm-password").attr("type")?($("#create-confirm-password").attr("type","text"),$("#create-confirm-password").next().html('<i class="ri-eye-line align-middle"></i>')):($("#create-confirm-password").attr("type","password"),$("#create-confirm-password").next().html('<i class="ri-eye-off-line align-middle"></i>'))})});
    </script>
@endpush
