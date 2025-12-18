@extends('admin.layouts.master')

@php
    $product = \App\Models\Product::findOrfail(request()->product);
@endphp
@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <div class="main-content app-content">
            <div class="container-fluid"> <!-- PAGE-HEADER -->
                <div class="page-header">
                    <h1 class="page-title my-auto">Thêm Tài Khoản: {{ $product->name }}</h1>
                    <div>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"> <a href="javascript:void(0)">Ecommerce</a> </li>
                            <li class="breadcrumb-item active" aria-current="page">Thêm Tài Khoản</li>
                        </ol>
                    </div>
                </div> <!-- PAGE-HEADER END --> <!-- Start::row-1 -->
                <div class="page-header d-flex justify-content-between">
                    <a href="{{ route('admin.product.index') }}" class="btn btn-primary btn-wave waves-effect waves-light">
                        Trở Lại</a>
                    <a href="{{ route('admin.product-account-store.create', ['product' => $product->id]) }}"
                        class="btn btn-primary btn-wave waves-effect waves-light">Thêm Mới</a>
                </div>
                <div class="row mt-3">
                    <div class="col-xl-12">
                        <div class="card custom-card">
                            <div class="card-header">
                                <div class="card-title"> Basic Datatable </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <div id="datatable-basic_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                                        {{ $dataTable->table() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection

    @push('scripts')
        {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
        <script>
            $(document).ready(function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
            })
        </script>
    @endpush
