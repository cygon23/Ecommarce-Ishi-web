<!DOCTYPE html>
<html>

<head>
    @include('admin.css')

    <style>
        table {
            border: 2px solid skyblue;
            text-align: center;
            width: 99%
        }

        th {
            background-color: skyblue;
            padding: 10px;
            font-size: 19px;
            font-weight: bold;
            text-align: center;
        }

        .order-table {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        td {
            color: white;
            padding: 15px;
            border: 1px solid
        }

        .pagination {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 20px;
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
                <h2 class="h5 no-margin-bottom">Dashboard</h2>
            </div>
        </div>

        <div class="order-table">
            <table>
                <tr>
                    <th>Customer Name</th>
                    <th>Adress</th>
                    <th>Phone</th>
                    <th>Product Title</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>Update Status</th>
                    <th>Product Statement</th>
                </tr>
                @foreach ($datas as $data)
                    <tr>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->rec_address }}</td>
                        <td>{{ $data->phone }}</td>
                        <td>{{ $data->product->title }}</td>
                        <td>{{ $data->product->price }}</td>
                        <td>
                            @if ($data->product->image)
                                <img src="{{ asset('products/' . $data->product->image) }}" alt="Product Image"
                                    width="100">
                            @else
                                No Image
                            @endif
                        </td>
                        <td>
                            @switch($data->status)
                                @case('progress')
                                    <span class="text-warning"><i class="fas fa-times-circle"></i> on progress</span>
                                @break

                                @case('On The way')
                                    <span class="text-success"><i class="fas fa-truck"></i> processed</span>
                                @break

                                @case('delivered')
                                    <span class="text-secondary"><i class="fas fa-clock"></i> Delivered</span>
                                @break

                                @default
                                    <span class="text-danger">Unknown status</span>
                            @endswitch
                        </td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Update Status">
                                <a href="{{ url('product_transfer', $data->id) }}" class="btn btn-warning"
                                    title="On the Way">
                                    <i class="fas fa-truck"></i> On the Way
                                </a>
                                <a href="{{ url('product_delivered', $data->id) }}" class="btn btn-success"
                                    title="Delivered">
                                    <i class="fas fa-check-circle"></i> Delivered
                                </a>
                            </div>
                        </td>
                        <td>
                            <a href="{{ url('product_statement', $data->id) }}"> <i class="fas fa-file-pdf"></i> Download
                                PDF</a>
                        </td>
                    </tr>
                @endforeach



            </table>

        </div>
        <div class="pagination">
            {{-- {{ $datas->links() }} --}}
            {{ $datas->onEachSide(2)->links() }}
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
