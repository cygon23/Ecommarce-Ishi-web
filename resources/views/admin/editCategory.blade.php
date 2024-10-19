<!DOCTYPE html>
<html>

<head>
    @include('admin.css')
    <style>
        .div_update {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        input[type='text'] {
            width: 400px;
            height: 50px;
        }
    </style>
</head>

<body>
    @include('admin.header')
    <!-- Sidebar Navigation-->
    @include('admin.sidebar')
    <!-- Sidebar Navigation end-->
    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
                <h3 style="color:white ">Update Category</h3>
                <div class="div_update">
                    <form action="{{ url('update_category', $data->id) }}" method="post">
                        @csrf
                        <input type="text" name="category" value="{{ $data->category_name }}">
                        <input class="btn btn-secondary" type="submit" value="Update Cateory">
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
