@extends('admin.layouts.master')

@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <div class="main-content app-content">
            <div class="container-fluid"> <!-- PAGE-HEADER -->
                <div class="page-header">
                    <h1 class="page-title my-auto">Quản Lý Người Dùng Tạm Xóa</h1>
                    <div>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"> <a href="javascript:void(0)">Ecommerce</a> </li>
                            <li class="breadcrumb-item active" aria-current="page">Quản Lý Người Dùng Tạm Xóa</li>
                        </ol>
                    </div>
                </div> <!-- PAGE-HEADER END --> <!-- Start::row-1 -->
                <div class="page-header d-flex justify-content-end">
                    <a href="{{ route('admin.coupon.create') }}"
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
                // ? Restore User
                $('body').on('click', '.restoreUserBtn', function(event) {
                    event.preventDefault();
                    let restoreUrl = $(this).attr('href');
                    let id = $(this).data('id');
                    Swal.fire({
                        title: 'Bạn có chắc chắn muốn khôi phục lại tài khoản này?',
                        text: "Tài Khoản này sẽ được khôi phục trở lại!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Đồng ý, khôi phục nó đi!',
                        cancelButtonText: 'Hủy'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                type: 'PUT',
                                url: restoreUrl,
                                success: function(data) {
                                    if (data.status == 'success') {
                                        Swal.fire(
                                            'Đã Xóa!',
                                            data.message,
                                            'success'
                                        )

                                        $('tbody').find('tr#' + id).remove();
                                    } else if (data.status == 'error') {
                                        Swal.fire(
                                            'Lỗi!',
                                            data.message,
                                            'error'
                                        )
                                        window.location.reload();
                                    }
                                },
                                error: function(xhr, status, error) {
                                    Swal.fire(
                                        'Lỗi!',
                                        error,
                                        'error'
                                    )
                                    window.location.reload();
                                }
                            })
                        }
                    })

                })
                // ? Delete User
                $('body').on('click', '.deleteForever', function(event) {
                    event.preventDefault();
                    let restoreUrl = $(this).attr('href');
                    let id = $(this).data('id');
                    Swal.fire({
                        title: 'Bạn có chắc chắn muốn xóa vĩnh viễn tài khoản này?',
                        text: "Tài Khoản này sẽ không bao giờ được khôi phục lại!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Đồng ý, xóa vĩnh viễn đi!',
                        cancelButtonText: 'Hủy'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                type: 'PUT',
                                url: restoreUrl,
                                success: function(data) {
                                    if (data.status == 'success') {
                                        Swal.fire(
                                            'Đã Xóa!',
                                            data.message,
                                            'success'
                                        )

                                        $('tbody').find('tr#' + id).remove();
                                    } else if (data.status == 'error') {
                                        Swal.fire(
                                            'Lỗi!',
                                            data.message,
                                            'error'
                                        )
                                        // window.location.reload();
                                    }
                                },
                                error: function(xhr, status, error) {
                                    Swal.fire(
                                        'Lỗi!',
                                        error,
                                        'error'
                                    )
                                    // window.location.reload();
                                }
                            })
                        }
                    })

                })
            })
        </script>
    @endpush
