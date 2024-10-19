<!DOCTYPE html>
<html>

<head>
    @include('admin.css')

    <style>
        .page-header {
            background-color: #007bff;
            /* You can change this to match your theme */
        }

        h3 {
            color: white;
            margin-bottom: 0;
        }

        .form-control,
        .form-control-file {
            font-size: 16px;
            height: 45px;
        }

        .form-control::placeholder {
            color: #6c757d;
        }

        .btn-success {
            font-size: 18px;
        }
    </style>

</head>

<body>
    @include('admin.header')
    <!-- Sidebar Navigation-->
    @include('admin.sidebar')
    <!-- Sidebar Navigation end-->
    <div class="page-content">
        <div class="page-header bg-primary py-3">
            <div class="container-fluid">
                <h3 class="text-white">Product List</h3>
            </div>
        </div>

        <div class="container">
            <h2>All Products</h2>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Price $</th>
                        <th>Quantity</th>
                        <th>Category</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($activeProducts as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->title }}</td>
                            <td>{{ Str::limit($product->description, 50) }}</td> <!-- Limit the description length -->
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->quantity }}</td>
                            <td>{{ $product->category }}</td>
                            <td>
                                @if ($product->image)
                                    <img src="{{ asset('products/' . $product->image) }}" alt="Product Image"
                                        width="50">
                                @else
                                    No Image
                                @endif
                            </td>
                            <td>
                                <a href="{{ url('edit_product', $product->id) }}" class="btn btn-info">Edit</a>
                                <a href="{{ url('delete_product', $product->id) }}" class="btn btn-danger"
                                    onclick="confirmation(event)">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    </div>
    <!-- JavaScript files-->

    <!-- JavaScript files for sweet delete-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        function confirmation(ev) {
            ev.preventDefault(); // Prevent the default action (e.g., link click)

            // Get the URL to redirect to (in this case, the delete route)
            var urlToRedirect = ev.currentTarget.getAttribute('href');

            // Show the SweetAlert confirmation dialog
            swal({
                    title: "Are you sure you want to delete?",
                    text: "This will move the item to the trash.",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    // If the user confirms the action
                    if (willDelete) {
                        // Redirect to the deletion URL
                        window.location.href = urlToRedirect;
                    } else {
                        // If the user cancels, do nothing
                        return false;
                    }
                });
        }
    </script>



    <script src=" {{ asset('dash/vendor/jquery/jquery.min.js') }}"></script>
    <script src=" {{ asset('dash/vendor/popper.js/umd/popper.min.js') }}"></script>
    <script src="{{ asset('dash/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('dash/vendor/jquery.cookie/jquery.cookie.js') }}"></script>
    <script src="{{ asset('dash/vendor/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('dash/vendor/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('dash/js/charts-home.js') }}"></script>
    <script src="{{ asset('dash/js/front.js') }}"></script>
</body>

</html>
