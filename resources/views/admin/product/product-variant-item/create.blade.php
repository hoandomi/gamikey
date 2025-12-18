@extends('admin.layouts.master');

@section('content')
    <div class="main-content app-content">
        <div class="container-fluid">

            <!-- PAGE-HEADER -->
            <div class="page-header">
                <h1 class="page-title my-auto">Thêm Variant: {!! $variant->name !!}</h1>
                <div>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item">
                            <a href="javascript:void(0)">Ecommerce</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Thêm Variant: {!! $variant->name !!}</li>
                    </ol>
                </div>
            </div>
            <!-- PAGE-HEADER END -->
            <!-- Start::row-1 -->
            <div class="row">
                <div class="col-xl-12">
                    <div class="card custom-card">
                        <div class="card-body add-products p-0">
                            <form action="{{ route('admin.product-variant-item.store') }}" method="POST">
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
                                                                value="{{ $productVariantItem->product->name }}">
                                                            <label for="product-name-add"
                                                                class="form-label mt-1 fs-12 op-5 text-muted mb-0">* Tên Sản
                                                                Phẩm Không Quá 30 từ</label>
                                                        </div>
                                                        {{-- PRODUCT --}}
                                                        <div class="col-xl-12">
                                                            <label for="product-category-add" class="form-label">Sản
                                                                Phẩm</label>
                                                            <select class="form-select select2-container"
                                                                id="product-category-add"
                                                                aria-label="Default select example" name="productItem_id">
                                                                <option value="">Chọn Sản Phẩm</option>
                                                                @foreach ($productItems as $productItem)
                                                                    <option
                                                                        {{ old('productItem_id') == $productItem->id ? 'selected' : '' }}
                                                                        value="{{ $productItem->id }}">
                                                                        {{ $productItem->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-xl-12">
                                                            <label for="product-tags" class="form-label">Trạng Thái</label>
                                                            <select class="form-select" aria-label="Default select example"
                                                                name="status">
                                                                <option value="">Chọn Trạng Thái</option>
                                                                <option {{ old('status') === 0 ? 'selected' : '' }}
                                                                    value="0">Ẩn</option>
                                                                <option selected {{ old('status') === 1 ? 'selected' : '' }}
                                                                    value="1">Hiện</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-xl-12">
                                                            <input type="hidden" name="product_id"
                                                                value="{{ $product->id }}">
                                                            <input type="hidden" name="variant_id"
                                                                value="{{ $variant->id }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="px-4 py-3 border-top border-block-start-dashed d-sm-flex justify-content-end">
                                    <a href="{{ route('admin.tag.index') }}"
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
            $('.select2-container').select2();
        });
    </script>
@endpush
