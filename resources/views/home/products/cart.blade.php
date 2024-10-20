<!DOCTYPE html>
<html>

<head>
    @include('home.css')
</head>

<body>
    <div class="hero_area">
        <!-- header section strats -->
        @include('home.header')
        <!-- end header section -->

    </div>

    {{-- @foreach ($cart as $cart)
        {{ $cart->product->title }}
    @endforeach --}}

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <div class="container mt-4">
        <h3 class="text-center mb-4">Product List</h3>
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Product Title</th>
                    <th scope="col">Price</th>
                    <th scope="col">Image</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cart as $cart)
                    <tr>
                        <td>{{ $cart->product->title }}</td>
                        <td>{{ $cart->product->price }}</td>
                        <td>
                            <img src="{{ asset('products/' . $cart->product->image) }}" class="img-fluid rounded"
                                alt="{{ $cart->product->title }}"
                                style="width: 100px; height: 100px; object-fit: cover;">
                        </td>


                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>




    @include('home.footer')


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        function addToCart(productId) {
            $.ajax({
                url: '{{ url('mycart') }}', // Route to add to cart
                method: 'POST',
                data: {
                    product_id: productId,
                    _token: '{{ csrf_token() }}' // Include CSRF token for security
                },
                success: function(response) {
                    // Update cart count in the UI
                    $('#cart-count').text(response.cartCount);
                    alert('Item added to cart!');
                },
                error: function(xhr) {
                    alert('Error adding item to cart.');
                }
            });
        }
    </script>

</body>

</html>
