@extends('admin.layouts.master');

@section('content')
    <div class="main-content app-content">
        <div class="container-fluid">
            <!-- PAGE-HEADER -->
            <div class="page-header">
                <h1 class="page-title my-auto">Sửa Sản Phẩm: {{ $productVariantItem->product->name }}</h1>
                <div>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item">
                            <a href="javascript:void(0)">Ecommerce</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Sửa Sản Phẩm</li>
                    </ol>
                </div>
            </div>
            <!-- PAGE-HEADER END -->
            <!-- Start::row-1 -->
            <div class="row">
                <div class="col-xl-12">
                    <div class="card custom-card">
                        <div class="card-body add-products p-0">
                            <form action="{{ route('admin.product-variant-item.update', $productVariantItem->id) }}"
                                method="POST">
                                @csrf
                                @method('PUT')
                                <div class="p-4">
                                    <div class="row gx-5">
                                        <div class="col-12">
                                            <div class="card custom-card shadow-none mb-0 border-0">
                                                <div class="card-body p-0">
                                                    <div class="row gy-3">

                                                        {{-- NAME --}}
                                                        <div class="col-xl-12">
                                                            <label for="product-name-add" class="form-label">Tên
                                                                Variant</label>
                                                            <input type="text" class="form-control" id="product-name-add"
                                                                placeholder="Tên Variant" name="name"
                                                                value="{{ $productVariantItem->name }}">
                                                            <label for="product-name-add"
                                                                class="form-label mt-1 fs-12 op-5 text-muted mb-0">* Tên
                                                                Variant Không Quá 20 từ</label>
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
                                                                        {{ $productVariantItem->product_id == $productItem->id ? 'selected' : '' }}
                                                                        value="{{ $productItem->id }}">
                                                                        {{ $productItem->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-xl-12">
                                                            <label for="product-tags" class="form-label">Trạng
                                                                Thái</label>
                                                            <select class="form-select" aria-label="Default select example"
                                                                name="status">
                                                                <option value="">Chọn Trạng Thái</option>
                                                                <option
                                                                    {{ $productVariantItem->status === 0 ? 'selected' : '' }}
                                                                    value="0">Ẩn</option>
                                                                <option
                                                                    {{ $productVariantItem->status === 1 ? 'selected' : '' }}
                                                                    value="1">Hiện</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="px-4 py-4 border-top border-block-start-dashed d-sm-flex justify-content-end">
                                    <a href="{{ route('admin.product-variant-item.index', ['productId' => $productVariantItem->product_id, 'variantId' => $productVariantItem->product_variant_id]) }}"
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
        $(document).ready(function() {
            $('.select2-container').select2();
        });
    </script>
@endpush
