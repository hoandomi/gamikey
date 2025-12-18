@extends('admin.layouts.master');

@section('content')
    <div class="main-content app-content">
        <div class="container-fluid">
            <!-- PAGE-HEADER -->
            <div class="page-header">
                <h1 class="page-title my-auto">Thống Kê</h1>
                <div>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item">
                            <a href="javascript:void(0)">Trang Chủ</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Thống Kê</li>
                    </ol>
                </div>
            </div>
            <!-- PAGE-HEADER END -->
            <!-- ROW-1 -->
            <div class="row">
                <div class="col-xl-12">
                    <div class="card custom-card">
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-xl-3 border-end border-inline-end-dashed">
                                    <div class="d-flex flex-wrap align-items-top p-4">
                                        <div class="me-3 lh-1">
                                            <span class="avatar avatar-md avatar-rounded bg-primary shadow-sm">
                                                <i class="fas fa-box-usd"></i>
                                            </span>
                                        </div>
                                        <div class="flex-fill">
                                            <h5 class="fw-semibold mb-1">{{ $products }}</h5>
                                            <p class="text-muted mb-0 fs-12">Tổng Sản Phẩm</p>
                                        </div>
                                        <div>
                                            <span class="badge bg-success-transparent"><i
                                                    class="ri-arrow-up-s-line align-middle me-1 d-inline-block"></i>1.31%</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 border-end border-inline-end-dashed">
                                    <div class="d-flex flex-wrap align-items-top p-4">
                                        <div class="me-3 lh-1">
                                            <span class="avatar avatar-md avatar-rounded bg-secondary shadow-sm">
                                                <i class="fas fa-user-crown"></i>
                                            </span>
                                        </div>
                                        <div class="flex-fill">
                                            <h5 class="fw-semibold mb-1">{{ $users }}</h5>
                                            <p class="text-muted mb-0 fs-12">Tổng Người Dùng</p>
                                        </div>
                                        <div>
                                            <span class="badge bg-danger-transparent"><i
                                                    class="ri-arrow-down-s-line align-middle me-1"></i>1.14%</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 border-end border-inline-end-dashed">
                                    <div class="d-flex flex-wrap align-items-top p-4">
                                        <div class="me-3 lh-1">
                                            <span class="avatar avatar-md avatar-rounded bg-success shadow-sm">
                                                <i class="fas fa-comment-alt-lines"></i>
                                            </span>
                                        </div>
                                        <div class="flex-fill">
                                            <h5 class="fw-semibold mb-1">{{ $comments }}</h5>
                                            <p class="text-muted mb-0 fs-12">Tổng Bình Luận</p>
                                        </div>
                                        <div>
                                            <span class="badge bg-success-transparent"><i
                                                    class="ri-arrow-up-s-line align-middle me-1 d-inline-block"></i>2.58%</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3">
                                    <div class="d-flex flex-wrap align-items-top p-4">
                                        <div class="me-3 lh-1">
                                            <span class="avatar avatar-md avatar-rounded bg-warning shadow-sm">
                                                <i class="fas fa-box-check"></i>
                                            </span>
                                        </div>
                                        <div class="flex-fill">
                                            <h5 class="fw-semibold mb-1">{{ $orders }}</h5>
                                            <p class="text-muted mb-0 fs-12">Tổng Đơn Hàng</p>
                                        </div>
                                        <div>
                                            <span class="badge bg-success-transparent"><i
                                                    class="ri-arrow-up-s-line align-middle me-1 d-inline-block"></i>12.05%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-12">
                    <div class="card custom-card">
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-xl-3 border-end border-inline-end-dashed">
                                    <div class="d-flex flex-wrap align-items-top p-4">
                                        <div class="me-3 lh-1">
                                            <span class="avatar avatar-md avatar-rounded bg-primary shadow-sm">
                                                <i class="fas fa-box-usd"></i>
                                            </span>
                                        </div>
                                        <div class="flex-fill">
                                            <h5 class="fw-semibold mb-1">{{ $categories }}</h5>
                                            <p class="text-muted mb-0 fs-12">Tổng Danh Mục </p>
                                        </div>
                                        <div>
                                            <span class="badge bg-success-transparent"><i
                                                    class="ri-arrow-up-s-line align-middle me-1 d-inline-block"></i>1.31%</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 border-end border-inline-end-dashed">
                                    <div class="d-flex flex-wrap align-items-top p-4">
                                        <div class="me-3 lh-1">
                                            <span class="avatar avatar-md avatar-rounded bg-secondary shadow-sm">
                                                <i class="fas fa-user-crown"></i>
                                            </span>
                                        </div>
                                        <div class="flex-fill">
                                            <h5 class="fw-semibold mb-1">{{ $sucCategories }}</h5>
                                            <p class="text-muted mb-0 fs-12">Tổng Danh Mục Phụ</p>
                                        </div>
                                        <div>
                                            <span class="badge bg-danger-transparent"><i
                                                    class="ri-arrow-down-s-line align-middle me-1"></i>1.14%</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 border-end border-inline-end-dashed">
                                    <div class="d-flex flex-wrap align-items-top p-4">
                                        <div class="me-3 lh-1">
                                            <span class="avatar avatar-md avatar-rounded bg-success shadow-sm">
                                                <i class="fas fa-comment-alt-lines"></i>
                                            </span>
                                        </div>
                                        <div class="flex-fill">
                                            <h5 class="fw-semibold mb-1">{{ $brands }}</h5>
                                            <p class="text-muted mb-0 fs-12">Tổng Thương Hiệu</p>
                                        </div>
                                        <div>
                                            <span class="badge bg-success-transparent"><i
                                                    class="ri-arrow-up-s-line align-middle me-1 d-inline-block"></i>2.58%</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3">
                                    <div class="d-flex flex-wrap align-items-top p-4">
                                        <div class="me-3 lh-1">
                                            <span class="avatar avatar-md avatar-rounded bg-warning shadow-sm">
                                                <i class="fas fa-box-check"></i>
                                            </span>
                                        </div>
                                        <div class="flex-fill">
                                            <h5 class="fw-semibold mb-1">{{ $productAcccount }}</h5>
                                            <p class="text-muted mb-0 fs-12">Tổng Tài Khoản</p>
                                        </div>
                                        <div>
                                            <span class="badge bg-success-transparent"><i
                                                    class="ri-arrow-up-s-line align-middle me-1 d-inline-block"></i>12.05%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-12">
                    <div class="card custom-card">
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-xl-3 border-end border-inline-end-dashed">
                                    <div class="d-flex flex-wrap align-items-top p-4">
                                        <div class="me-3 lh-1">
                                            <span class="avatar avatar-md avatar-rounded bg-primary shadow-sm">
                                                <i class="fas fa-sack-dollar"></i>
                                            </span>
                                        </div>
                                        <div class="flex-fill">
                                            <h5 class="fw-semibold mb-1">{{ formatPrice($amountADay) }}</h5>
                                            <p class="text-muted mb-0 fs-12">Doanh Thu Ngày Hôm Này</p>
                                        </div>
                                        <div>
                                            <span class="badge bg-success-transparent"><i
                                                    class="ri-arrow-up-s-line align-middle me-1 d-inline-block"></i>1.31%</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 border-end border-inline-end-dashed">
                                    <div class="d-flex flex-wrap align-items-top p-4">
                                        <div class="me-3 lh-1">
                                            <span class="avatar avatar-md avatar-rounded bg-secondary shadow-sm">
                                                <i class="fas fa-sack-dollar"></i>
                                            </span>
                                        </div>
                                        <div class="flex-fill">
                                            <h5 class="fw-semibold mb-1">{{ formatPrice($amountAWeek) }}</h5>
                                            <p class="text-muted mb-0 fs-12">Doanh Thu Tuần Này</p>
                                        </div>
                                        <div>
                                            <span class="badge bg-danger-transparent"><i
                                                    class="ri-arrow-down-s-line align-middle me-1"></i>1.14%</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 border-end border-inline-end-dashed">
                                    <div class="d-flex flex-wrap align-items-top p-4">
                                        <div class="me-3 lh-1">
                                            <span class="avatar avatar-md avatar-rounded bg-success shadow-sm">
                                                <i class="fas fa-sack-dollar"></i>
                                            </span>
                                        </div>
                                        <div class="flex-fill">
                                            <h5 class="fw-semibold mb-1">{{ formatPrice($amountAMonth) }}</h5>
                                            <p class="text-muted mb-0 fs-12">Danh Thu Tháng Này</p>
                                        </div>
                                        <div>
                                            <span class="badge bg-success-transparent"><i
                                                    class="ri-arrow-up-s-line align-middle me-1 d-inline-block"></i>2.58%</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3">
                                    <div class="d-flex flex-wrap align-items-top p-4">
                                        <div class="me-3 lh-1">
                                            <span class="avatar avatar-md avatar-rounded bg-warning shadow-sm">
                                                <i class="fas fa-sack-dollar"></i>
                                            </span>
                                        </div>
                                        <div class="flex-fill">
                                            <h5 class="fw-semibold mb-1">{{ formatPrice($amountAYear) }}</h5>
                                            <p class="text-muted mb-0 fs-12">Danh Thu Năm Nay</p>
                                        </div>
                                        <div>
                                            <span class="badge bg-success-transparent"><i
                                                    class="ri-arrow-up-s-line align-middle me-1 d-inline-block"></i>12.05%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
