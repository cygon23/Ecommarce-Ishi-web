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
                <h3 class="text-white">Add Product</h3>
            </div>
        </div>

        <div class="container mt-4">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <form action="{{ url('upload_product') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <!-- Product Title -->
                        <div class="form-group">
                            <label for="product_title">Product Title</label>
                            <input type="text" class="form-control" name="title" required>
                        </div>

                        <!-- Product Description -->
                        <div class="form-group">
                            <label for="product_description">Product Description</label>
                            <textarea class="form-control" name="description" rows="4"></textarea>
                        </div>

                        <!-- Product Price -->
                        <div class="form-group">
                            <label for="product_price">Product Price</label>
                            <input type="text" class="form-control" name="price" required>
                        </div>

                        <!-- Quantity -->
                        <div class="form-group">
                            <label for="quantity">Quantity</label>
                            <input type="number" class="form-control" name="quantity" required>
                        </div>

                        <!-- Product Category -->
                        <div class="form-group">
                            <label for="category">Product Category</label>
                            <select name="category" class="form-control" required>
                                <option disabled selected>Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Product Image -->
                        <div class="form-group">
                            <label for="product_image">Product Image</label>
                            <input type="file" class="form-control-file" name="image" required>
                        </div>

                        <!-- Submit Button -->
                        <div class="form-group text-center">
                            <input type="submit" value="Add Product" class="btn btn-success px-5">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    </div>
    <!-- JavaScript files-->


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
