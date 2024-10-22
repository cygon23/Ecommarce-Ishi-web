<!DOCTYPE html>
<html>

<head>
    @include('home.css')

    <style>
        /* General Table Styling */
        .order-table {
            width: 100%;
            border-collapse: collapse;
            margin: 25px 0;
            font-size: 1rem;
            font-family: 'Roboto', sans-serif;
            background-color: #fdfdfd;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            table-layout: auto;
            /* Allows the table to adjust based on content */
        }

        /* Table Head Styling */
        .order-table thead {
            background-color: skyblue;
            color: white;
            text-transform: uppercase;
        }

        .order-table th,
        .order-table td {
            padding: 15px 20px;
            border-bottom: 1px solid #f1f1f1;
            text-align: left;
        }

        /* Column width adjustments */
        .order-table th.product-name {
            width: 40%;
            /* Increase width for product name */
        }

        .order-table th.price {
            width: 20%;
            /* Adjust width for price */
        }

        .order-table th.delivery-status {
            width: 20%;
            /* Adjust width for delivery status */
        }

        .order-table th.image {
            width: 20%;
            /* Adjust width for image */
        }

        /* Hover Effect */
        .order-table tbody tr:hover {
            background-color: #f8f9fa;
        }

        /* Icon Styling */
        .order-table thead th i {
            font-size: 1.2rem;
            margin-right: 8px;
            vertical-align: middle;
        }

        /* Image Styling */
        .order-table tbody td img {
            width: 60px;
            height: 60px;
            border-radius: 8px;
            object-fit: cover;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        /* Status Labels */
        .status {
            padding: 5px 10px;
            border-radius: 12px;
            font-size: 0.9rem;
            font-weight: bold;
        }

        .status.delivered {
            background-color: #28a745;
            color: white;
        }

        .status.pending {
            background-color: #ffc107;
            color: white;
        }

        /* Responsive Design */
        @media (max-width: 768px) {

            .order-table th,
            .order-table td {
                padding: 10px;
                font-size: 0.9rem;
            }

            .order-table tbody td img {
                width: 40px;
                height: 40px;
            }
        }
    </style>
</head>

<body>
    <div class="hero_area">
        <!-- header section strats -->
        @include('home.header')
        <!-- end header section -->
    </div>

    <div>



        <table class="order-table">
            <thead>
                <tr>
                    <th class="product-name"><i class="fas fa-box"></i> Product Name</th>
                    <th class="price"><i class="fas fa-dollar-sign"></i> Price</th>
                    <th class="delivery-status"><i class="fas fa-truck"></i> Delivery Status</th>
                    <th class="image"><i class="fas fa-image"></i> Image</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td>{{ $order->product->title }}</td>
                        <td>{{ $order->product->price }}</td>
                        <td><span class="status delivered">{{ $order->status }}</span></td>
                        <td>
                            <img src="/products/{{ $order->product->image }}" alt="Product">
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>





    </div>





    <!-- info section -->
    @include('home.footer')
</body>

</html>
