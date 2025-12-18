<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light"
    data-menu-styles="light" data-toggled="close">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- Meta Data -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> Sash – Bootstrap 5 Admin &amp; Dashboard Template </title>
    <meta name="Description" content="Bootstrap Responsive Admin Web Dashboard HTML5 Template">
    <meta name="Author" content="Spruko Technologies Private Limited">
    <meta name="keywords"
        content="admin dashboard,dashboard design htmlbootstrap admin template,html admin panel,admin dashboard html,admin panel html template,bootstrap dashboard,html admin template,html dashboard,html admin dashboard template,bootstrap dashboard template,dashboard html template,bootstrap admin panel,dashboard admin bootstrap,bootstrap admin dashboard">

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('backend/assets/images/brand-logos/favicon.ico') }}" type="image/x-icon">
    {{-- !! STYLE CSS --}}
    @include('admin.layouts.style')

</head>

<body>

    <!-- Start Switcher -->
    @include('admin.layouts.section.switcher')
    <!-- End Switcher -->


    <!-- Loader -->
    <div id="loader">
        <img src="{{ asset('backend/assets/images/media/loader.svg') }}" alt="">
    </div>
    <!-- Loader -->

    <div class="page">
        <!-- app-header -->
        @include('admin.layouts.section.header')
        <!-- /app-header -->
        <!--  !! Start::app-sidebar -->
        @include('admin.layouts.section.sidebar')
        <!-- !!  End::app-sidebar -->

        <!-- Start::app-content -->
        @yield('content')
        <!-- End::app-content -->

        <!-- Start::Modal -->
        @include('admin.layouts.section.modal')
        <!-- End::Modal -->
        <!-- Start Switcher -->
        @include('admin.layouts.section.switcher2')
        <!-- End Switcher -->

        <!-- Footer Start -->
        @include('admin.layouts.section.footer')
        <!-- Footer End -->
    </div>
    <!-- Scroll To Top -->
    <div class="scrollToTop">
        <span class="arrow"><i class="ri-arrow-up-s-fill fs-20"></i></span>
    </div>
    <div id="responsive-overlay"></div>
    <!-- Scroll To Top -->

    {{-- !! SCRIPTS --}}

    @include('admin.layouts.scripts')

    <script>
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                toastr.error("{{ $error }}")
            @endforeach
        @endif
    </script>

    <script>
        $(document).ready(function() {
            // ? Delete Category
            $('body').on('click', '.deleteBtn', function(event) {
                event.preventDefault();
                let deleteUrl = $(this).attr('href');
                let id = $(this).data('id');
                Swal.fire({
                    title: 'Bạn có chắc chắn muốn xóa?',
                    text: "Dữ liệu bị xóa sẽ không thể khôi phục lại được!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Đồng ý, xóa nó đi!',
                    cancelButtonText: 'Hủy'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: 'DELETE',
                            url: deleteUrl,
                            success: function(data) {
                                if (data.status == 'success') {
                                    Swal.fire(
                                        'Đã Xóa!',
                                        data.message,
                                        'success'
                                    )
                                    // Kiếm từ tbody ra thẻ tr có id bằng 5 thì ẩn nó đi
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
        })
    </script>
    @stack('scripts')

</body>

</html>
