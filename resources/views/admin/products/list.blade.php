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

        .pagination {
            display: flex;
            justify-content: right;
            align-items: right;
            margin-top: 20px;
        }

        td {
            color: white;
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
            @if (request('search'))
                <a href="{{ url('product_search') }}" class="reset-btn" aria-label="View all products">
                    <i class="fa fa-arrow-left"></i> Back
                </a>
            @endif
            <h2>All Products</h2>

            <table class="table table-striped">
                <thead>
                    <tr>

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
                            <td>{{ $product->title }}</td>
                            <td>{{ Str::limit($product->description, 100) }}</td> <!-- Limit the description length -->
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->quantity }}</td>
                            <td>{{ $product->category ? $product->category->category_name : 'No Category' }}</td>
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
            <div class="paginaton">
                {{ $activeProducts->onEachSide(1)->links() }}
            </div>


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
            ev.preventDefault();

            var urlToRedirect = ev.currentTarget.getAttribute('href');

            swal({
                    title: "Are you sure you want to delete?",
                    text: "This will move the item to the trash.",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {

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
