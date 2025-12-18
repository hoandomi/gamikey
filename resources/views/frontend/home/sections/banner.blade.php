<section class="section-banner">
    @php
        $products = \App\Models\Product::where('status', 1)
            ->limit(4)
            ->get(['image', 'slug']);
    @endphp
    <div class="col-12 d-flex section-banner_items flex-wrap">
        @foreach ($products as $product)
            <div class="col-12 col-sm-6 col-lg-3 section-banner_item">
                <a href="{{ route('products.show', $product->slug) }}" class="section-banner_anchor">
                    <img style="height: 175px" loading="lazy" class="section-banner_img" src="{{ asset($product->image) }}" alt="">
                    <div class="section-banner_arrowNext"><i class="far fa-long-arrow-alt-right fa-fw"></i>
                    </div>
                </a>
            </div>
        @endforeach

    </div>
</section>
