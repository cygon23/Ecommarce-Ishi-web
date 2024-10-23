<!DOCTYPE html>
<html>

<head>
    @include('home.css')

    <style>
        .product-image {
            display: flex;
            justify-content: center;
            align-content: center;
            padding: 30px;

        }

        .detail-box {
            padding: 5px;
        }
    </style>
</head>

<body>
    <div class="hero_area">
        <!-- header section strats -->
        @include('home.header')
        <!-- end header section -->

    </div>

    <!--product detail start here -->

    <section class="shop_section layout_padding">
        <div class="container">
            <div class="heading_container heading_center">
                <h2>
                    Latest Products
                </h2>
            </div>
            <div class="row">
                <div class=" col-md-12">
                    <div class="box">

                        <div class="product-image">
                            <img width="400" src="/products/{{ $product->image }}" alt="">
                        </div>
                        <div class="detail-box">
                            <h6>
                                {{ $product->title }}
                            </h6>
                            <h6>
                                Price
                                <span>
                                    {{ $product->price }}
                                </span>
                            </h6>
                        </div>

                        <div class="detail-box">
                            <h6>
                                Category: {{ $product->category->category_name }}
                            </h6>
                            <h6>
                                Available Quantity
                                <span>
                                    {{ $product->quantity }}
                                </span>
                            </h6>
                        </div>

                        <div class="detail-box">
                            <p>
                                {{ $product->description }}
                            </p>
                        </div>

                        <div class="detail-box">
                            <a class="btn btn-primary" href="{{ url('add_cart', $product->id) }}">Add to Cart</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!--product detail end here -->



    <!-- info section -->
    @include('home.footer')
</body>

</html>
