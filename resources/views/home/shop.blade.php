<section class="shop_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>
                {{ __('messages.product-h1') }}
            </h2>
        </div>
        <div class="row">
            @foreach ($products as $product)
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="box">

                        <div class="img-box">
                            <img src="products/{{ $product->image }}" alt="">
                        </div>
                        <div class="detail-box">
                            <h6>
                                {{ $product->title }}
                            </h6>
                            <h6>
                                {{ __('messages.product-price') }}
                                <span>
                                    {{ $product->price }}
                                </span>
                            </h6>
                        </div>
                        {{-- <div class="new">
                            <span>
                                New
                            </span>
                        </div> --}}
                        <div style="padding: 10px">
                            <a class="btn btn-danger"
                                href="{{ url('product_details', $product->id) }}">{{ __('messages.product-details') }}</a>

                            <a class="btn btn-success"
                                href="{{ url('add_cart', $product->id) }}">{{ __('messages.product-cart') }}</a>
                        </div>
                    </div>
                </div>
            @endforeach


        </div>
        <div class="btn-box">
            <a href="">
                {{ __('messages.product-all') }}
            </a>
        </div>
    </div>
</section>
