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
                <h3 class="text-white">Edit Product</h3>
            </div>
        </div>

        <div class="container mt-4">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <!-- Form to edit the product -->
                    <form action="{{ url('update_product', $product->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title">Product Title</label>
                            <input type="text" name="title" class="form-control" value="{{ $product->title }}"
                                required>
                        </div>

                        <div class="form-group">
                            <label for="description">Product Description</label>
                            <textarea name="description" class="form-control" required>{{ $product->description }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="price">Product Price</label>
                            <input type="text" name="price" class="form-control" value="{{ $product->price }}"
                                required>
                        </div>

                        <div class="form-group">
                            <label for="quantity">Quantity</label>
                            <input type="number" name="quantity" class="form-control" value="{{ $product->quantity }}"
                                required>
                        </div>

                        <div class="form-group">
                            <label for="category">Product Category</label>
                            <select name="category_id" class="form-control" required>
                                <option disabled>Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ $category->id == $product->category_id ? 'selected' : '' }}>
                                        {{ $category->category_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>


                        <div class="form-group">
                            <label for="image">Product Image</label>
                            <input type="file" name="image" class="form-control">
                            <img src="{{ asset('products/' . $product->image) }}" alt="Product Image"
                                class="img-thumbnail mt-2" width="150">
                        </div>

                        <button type="submit" class="btn btn-primary">Update Product</button>
                    </form>
                </div>

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
