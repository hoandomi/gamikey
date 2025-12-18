@extends('admin.layouts.master');


@section('content')
    <div class="main-content app-content">
        <div class="container-fluid">
            <!-- PAGE-HEADER -->
            <div class="page-header">
                <h1 class="page-title my-auto">Thêm Sản Phẩm</h1>
                <div>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item">
                            <a href="javascript:void(0)">Ecommerce</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Thêm Sản Phẩm</li>
                    </ol>
                </div>
            </div>
            <!-- PAGE-HEADER END -->
            <!-- Start::row-1 -->
            <div class="row">
                <div class="col-xl-12">
                    <div class="card custom-card">
                        <div class="card-body add-products p-0">
                            <form action="{{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="p-4">
                                    <div class="row gx-5">
                                        <div class="col-12">
                                            <div class="card custom-card shadow-none mb-0 border-0">
                                                <div class="card-body p-0">
                                                    <div class="row gy-3">
                                                        {{-- NAME --}}
                                                        <div class="col-xl-12">
                                                            <label for="product-name-add" class="form-label">Tên Sản
                                                                Phẩm</label>
                                                            <input type="text" class="form-control" id="product-name-add"
                                                                placeholder="Tên Sản Phẩm" name="name"
                                                                value="{{ old('name') }}">
                                                            <label for="product-name-add"
                                                                class="form-label mt-1 fs-12 op-5 text-muted mb-0">* Tên Sản
                                                                Phẩm Không Quá 30 từ</label>
                                                        </div>
                                                        {{-- IMAGE --}}
                                                        <div class="col-xl-12">
                                                            <label for="formFile" class="form-label">Ảnh Sản Phẩm</label>
                                                            <input class="form-control" type="file" id="formFile"
                                                                name="image">

                                                        </div>
                                                        {{-- PRICE --}}
                                                        <div class="col-xl-6">
                                                            <label for="product-price-add" class="form-label">Giá</label>
                                                            <input type="text" class="form-control"
                                                                id="product-price-add" placeholder="Giá Sản Phẩm"
                                                                name="price" value="{{ old('price') }}">
                                                        </div>
                                                        {{-- DISCOUNT --}}
                                                        <div class="col-xl-6">
                                                            <label for="product-discount_price-add" class="form-label">Giá
                                                                Khuyến
                                                                Mãi</label>
                                                            <input type="text" class="form-control"
                                                                id="product-discount_price-add" placeholder="Giá Khuyến Mãi"
                                                                name="discount_price" value="{{ old('discount_price') }}">
                                                            <label for="product-name-add"
                                                                class="form-label mt-1 fs-12 op-5 text-muted mb-0">* Nếu
                                                                không khuyến mãi thì để trống</label>
                                                        </div>
                                                        {{-- START DATE DISCOUNT --}}
                                                        <div class="col-xl-6">
                                                            <label for="product-start_discount_price-add"
                                                                class="form-label">Ngày
                                                                Bắt Đầu Khuyến Mãi
                                                                Khuyến
                                                                Mãi</label>
                                                            <div class="input-group">
                                                                <div class="input-group-text text-muted"> <i
                                                                        class="ri-calendar-line"></i> </div>
                                                                <input name="startDate" type="text"
                                                                    value="{{ old('startDate') }}" class="form-control"
                                                                    id="datetime"
                                                                    placeholder="Chọn Ngày Bắt Đầu Khuyến Mãi Khuyến Mãi">
                                                            </div>
                                                            <label for="product-name-add"
                                                                class="form-label mt-1 fs-12 op-5 text-muted mb-0">* Nếu
                                                                không khuyến mãi thì để trống</label>
                                                        </div>
                                                        {{-- End DATE DISCOUNT --}}
                                                        <div class="col-xl-6">
                                                            <label for="product-end_discount_price-add"
                                                                class="form-label">Ngày
                                                                Kết Thúc Khuyến Mãi
                                                                Khuyến
                                                                Mãi</label>
                                                            <div class="input-group">
                                                                <div class="input-group-text text-muted"> <i
                                                                        class="ri-calendar-line"></i> </div>
                                                                <input name="endDate" type="text"
                                                                    value="{{ old('endDate') }}" class="form-control"
                                                                    id="datetime"
                                                                    placeholder="Chọn Ngày Kết Thúc Khuyến Mãi Khuyến">
                                                            </div>
                                                            <label for="product-name-add"
                                                                class="form-label mt-1 fs-12 op-5 text-muted mb-0">* Nếu
                                                                không khuyến mãi thì để trống</label>
                                                        </div>
                                                        {{-- CATEGORIES --}}
                                                        <div class="col-xl-6">
                                                            <label for="product-category-add" class="form-label">Danh
                                                                Mục</label>
                                                            <select class="form-select categorySelectVal"
                                                                id="select-container-1" aria-label="Default select example"
                                                                name="category_id">
                                                                <option value="">Chọn Danh Mục</option>
                                                                @foreach ($categories as $category)
                                                                    <option
                                                                        {{ old('category_id') == $category->id ? 'selected' : '' }}
                                                                        value="{{ $category->id }}">
                                                                        {{ $category->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        {{-- SUB-CATEGORIES --}}
                                                        <div class="col-xl-6">
                                                            <label for="product-category-add" class="form-label">Danh Mục
                                                                Phụ</label>
                                                            <select class="form-select subCategorySelectVal"
                                                                id="select-container-2"
                                                                aria-label="Default select example" name="subCategory_id">
                                                                <option value="">Chọn Danh Mục Phụ</option>
                                                            </select>
                                                        </div>
                                                        {{-- BRAND --}}
                                                        <div class="col-xl-6">
                                                            <label for="product-category-add" class="form-label">Thương
                                                                Hiệu</label>
                                                            <select class="form-select " id="select-container-4"
                                                                aria-label="Default select example" name="brand_id">
                                                                <option value="">Chọn Thương
                                                                    Hiệu</option>
                                                                @foreach ($brands as $brand)
                                                                    <option
                                                                        {{ old('brand_id') == $brand->id ? 'selected' : '' }}
                                                                        value="{{ $brand->id }}">
                                                                        {{ $brand->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        {{-- TAGS --}}
                                                        <div class="col-xl-6">
                                                            <label for="product-category-add"
                                                                class="form-label">Nhãn</label>
                                                            <select
                                                                class="js-example-basic-multiple-limit-max select2-hidden-accessible"
                                                                name="tags_id[]" multiple=""
                                                                data-select2-id="select2-data-4-z8g3" tabindex="-1"
                                                                aria-hidden="true">
                                                                @foreach ($tags as $tag)
                                                                    <option value="{{ $tag->id }}">
                                                                        {{ $tag->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        {{-- TYPE PRODUCT --}}
                                                        <div class="col-xl-6">
                                                            <label for="product-tags" class="form-label">Loại Sản
                                                                Phẩm</label>
                                                            <select class="form-select"
                                                                aria-label="Default select example" name="type">
                                                                <option value="">Chọn Loại Sản Phẩm</option>
                                                                <option {{ old('type') == 'Key' ? 'selected' : '' }}
                                                                    value="Key">Key</option>
                                                                <option {{ old('type') == 'Tài Khoản' ? 'selected' : '' }}
                                                                    value="Tài Khoản">Tài Khoản</option>
                                                                <option {{ old('type') == 'Nâng Cấp' ? 'selected' : '' }}
                                                                    value="Nâng Cấp">Nâng Cấp</option>
                                                            </select>
                                                        </div>
                                                        {{-- STATUS --}}
                                                        <div class="col-xl-6">
                                                            <label for="product-tags" class="form-label">Trạng
                                                                Thái</label>
                                                            <select class="form-select"
                                                                aria-label="Default select example" name="status">
                                                                <option value="">Chọn Trạng Thái</option>
                                                                <option {{ old('status') === 0 ? 'selected' : '' }}
                                                                    value="0">Ẩn</option>
                                                                <option selected
                                                                    {{ old('status') === 1 ? 'selected' : '' }}
                                                                    value="1">Hiện</option>
                                                            </select>
                                                        </div>
                                                        {{-- SHORT DESCRIPTION --}}
                                                        <div class="col-xl-12">
                                                            <label for="product-description-add" class="form-label">Mô Tả
                                                                Ngắn
                                                                Sản Phẩm</label>
                                                            <textarea class="form-control" id="product-description-add" rows="2" name="short_description">{{ old('short_description') }}</textarea>

                                                        </div>
                                                        {{-- LONG DESCRIPTION --}}
                                                        <div class="col-xl-12 my-5 editorValue">
                                                            <label for="product-description-add" class="form-label">Mô Tả
                                                                Sản Phẩm</label>
                                                            <div id="editor">
                                                                {{ old('long_description') }}</div>
                                                            <input type="hidden" name="long_description"
                                                                value="{{ old('long_description') }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="px-4 py-4 border-top border-block-start-dashed d-sm-flex justify-content-end">
                                    <a href="{{ route('admin.category.index') }}"
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

@push('scripts')
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // ? Quill Editor
            $('body').on('focusout', '#editor', function() {
                let html = $('.ql-editor').html();
                $('input[name=long_description]').val(html);

            });

            // ? Select2
            for (let i = 1; i <= 4; i++) {
                $('#select-container-' + i).select2();
            };

            // ? Get Sub Categories
            $('body').on('change', '.categorySelectVal', function() {
                let category_id = $(this).val();
                $.ajax({
                    type: 'GET',
                    data: {
                        category_id: category_id
                    },
                    url: "{{ route('admin.product.getSubCategories') }}",
                    success: function(data) {
                        $('.subCategorySelectVal').html(
                            '<option value="">Chọn Danh Mục</option>')
                        $.each(data, function(i, item) {
                            $('.subCategorySelectVal').append(
                                '<option value="' + item.id + '">' + item.name +
                                '</option>')
                            console.log(data);
                        });
                    },
                    error: function(xhr, status, error) {
                        console.log(xhr.responseText)
                    },
                })
            });
        })
    </script>
@endpush
