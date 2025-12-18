@extends('admin.layouts.master')

@section('content')
    <div class="main-content app-content">
        <div class="container">

            <!-- PAGE-HEADER -->
            <div class="page-header">
                <h1 class="page-title my-auto">Mail Settings</h1>
                <div>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item">
                            <a href="javascript:void(0)">Mail</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Mail Settings</li>
                    </ol>
                </div>
            </div>
            <!-- PAGE-HEADER END -->
            <!-- Start::row-1 -->
            <div class="row mb-5">
                <div class="col-xl-12">
                    <div class="card custom-card">
                        <div class="card-header d-sm-flex d-block">
                            <ul class="nav nav-tabs nav-tabs-header mb-0 d-sm-flex d-block" role="tablist">
                                <li class="nav-item m-1">
                                    <a class="nav-link paypal-info  active" data-bs-toggle="tab" role="tab"
                                        aria-current="page" href="#paypal-info" aria-selected="true">PAYPAL</a>
                                </li>
                                <li class="nav-item m-1">
                                    <a class="nav-link vnpay-info" data-bs-toggle="tab" role="tab" aria-current="page"
                                        href="#vnpay-info" aria-selected="true">VNPAY</a>
                                </li>
                                <li class="nav-item m-1">
                                    <a class="nav-link" data-bs-toggle="tab" role="tab" aria-current="page"
                                        href="#momo-info" aria-selected="true">MOMO</a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                @include('admin.payment-settings.sections.paypal-setting')
                                @include('admin.payment-settings.sections.vnpay-setting')
                                @include('admin.payment-settings.sections.momo-setting')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--End::row-1 -->

        </div>
    </div>
@endsection
