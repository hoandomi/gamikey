@extends('admin.layouts.master')

@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <div class="main-content app-content">
            <div class="container-fluid"> <!-- PAGE-HEADER -->
                <div class="page-header">
                    <h1 class="page-title my-auto">Thương Hiệu</h1>
                    <div>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"> <a href="javascript:void(0)">Ecommerce</a> </li>
                            <li class="breadcrumb-item active" aria-current="page">Thương Hiệu</li>
                        </ol>
                    </div>
                </div> <!-- PAGE-HEADER END --> <!-- Start::row-1 -->
                <div class="page-header d-flex justify-content-end">
                    <a href="{{ route('admin.brand.create') }}"
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

                // ? ChangeStatus
                $('body').on('click', '.toggleswitchStatus', function() {
                    let id = $(this).data('id');
                    $.ajax({
                        type: "PUT",
                        data: {
                            id: id
                        },
                        url: "{{route('admin.brand.change-status')}}",
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
window.location.reload();
 }
                    })
                });

            })
        </script>
    @endpush
