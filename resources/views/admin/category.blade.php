<!DOCTYPE html>
<html>

<head>
    @include('admin.css')

    <style>
        input[type='text'] {
            width: 400px;
            height: 50px;
        }

        .div_desgn {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .table_cat {
            text-align: center;
            margin: auto;
            border: 2px solid yellowgreen;
            margin-top: 50px;
            width: 600px;
        }

        th {
            background-color: skyblue;
            padding: 15px;
            font-size: 20px;
            font-weight: bold;
            color: white;

        }

        td {
            color: white;
            padding: 10px;
            border: 1px solid skyblue;

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
                <h2 style="color: white">Add Category</h2>
                @include('layouts._message')

                <div class="div_desgn">
                    <form action="{{ url('add_category') }}" method="POST">
                        @csrf
                        <div>
                            <input type="text" name="category">

                            <input class="btn btn-primary" type="submit" value="Add Category">
                        </div>
                </div>
                </form>
            </div>

        </div>
        <div>
            @include('layouts._message')
            <table class="table_cat">
                <tr>
                    <th>Category Name</th>
                    <th>Delete</th>
                    <th>Edit</th>
                </tr>
                @foreach ($data as $data)
                    <tr>
                        <td>{{ $data->category_name }}</td>
                        <td>
                            <a class="btn btn-success" href="{{ url('edit_category', $data->id) }}">Edit</a>
                        </td>

                        <td>
                            <a class="btn btn-danger" onclick="confirmation(event)"
                                href="{{ url('delete_category', $data->id) }}">Delete</a>
                        </td>

                    </tr>
                @endforeach

            </table>
        </div>
    </div>

    </div>
    </div>
    <!-- JavaScript files-->
    <!-- JavaScript sweet alert-->
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
