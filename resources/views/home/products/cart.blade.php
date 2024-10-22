<!DOCTYPE html>
<html>

<head>
    @include('home.css')

    <style>
        .total_price {
            text-align: center;
            margin-bottom: 70px;
            padding: 18px;
        }

        .footer {
            padding: 100px;
        }

        .shipping-form {
            padding-bottom: 120px;
        }
    </style>
</head>

<body>
    <div class="hero_area">
        <!-- header section strats -->
        @include('home.header')
        <!-- end header section -->

    </div>



    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <div class="container mt-4">
        <h3 class="text-center mb-4">Product List and Shipping Details</h3>
        <div class="row">
            @if (session('order_placed'))
                <!-- Order Placed Message -->
                <div class="col-md-12 text-center">
                    <div class="alert alert-success" role="alert">
                        <i class="bi bi-check-circle" style="font-size: 3rem; color: green;"></i>
                        <h4>Your order is in progress!</h4>
                        <p>Thank you for placing your order. We are processing it now and will notify you when it’s
                            ready.</p>
                    </div>
                </div>
            @else
                <!-- Left Column: Cart Table -->
                <div class="col-md-8">
                    <table class="table table-bordered table-hover align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">Product Title</th>
                                <th scope="col">Price</th>
                                <th scope="col">Image</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $value = 0; ?>
                            @foreach ($cart as $cart)
                                <tr>
                                    <td>{{ $cart->product->title }}</td>
                                    <td>{{ $cart->product->price }}</td>
                                    <td>
                                        <img src="{{ asset('products/' . $cart->product->image) }}"
                                            class="img-fluid rounded" alt="{{ $cart->product->title }}"
                                            style="width: 100px; height: 100px; object-fit: cover;">
                                    </td>
                                    <td>
                                        <a href="" class="btn btn-danger">Remove</a>
                                    </td>
                                </tr>
                                <?php $value += $cart->product->price; ?>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="total_price">
                        <h3>Total Value of Cart: ${{ $value }}</h3>
                    </div>
                    <div class="col-md-4 shipping-form">
                        <h4 class="mb-3">Shipping Details</h4>
                        <form action="{{ url('comfirm_order') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Receiver Name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ Auth::user()->name }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" class="form-control" id="address" name="address"
                                    value="{{ Auth::user()->address }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone Number</label>
                                <input type="text" class="form-control" id="phone" name="phone"
                                    value="{{ Auth::user()->phone }}" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Cash on Delivered</button>
                            <a class="btn btn-success" href="{{ url('stripe', $value) }}">Card payment</a>
                        </form>
                    </div>
                </div>
            @endif
        </div>
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
