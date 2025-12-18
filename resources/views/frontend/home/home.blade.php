@extends('frontend.layouts.master')

@section('content')

    <main class="pt-5">
        <section class="container">
            <!-- ************************* BANNER ************************* -->
            @include('frontend.home.sections.banner')

            <!-- ************************* HOT PRODUCT ************************* -->
            @include('frontend.home.sections.hot-product')

            <!-- ************************* CONTENT ************************* -->
            @include('frontend.home.sections.content')

            <!-- ************************* BEST PRODUCT ************************* -->
            @include('frontend.home.sections.best-product')

            <!-- ************************* STATISTICS ************************* -->
            @include('frontend.home.sections.statistics')

        </section>
    </main>
@endsection
