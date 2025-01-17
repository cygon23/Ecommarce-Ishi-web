<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            background-color: #fff;
            font-size: 16px;
            line-height: 24px;
            color: #555;
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
        }

        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }

        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }

        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }

        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }

        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }

        .company-info {
            text-align: right;
        }

        .footer {
            text-align: center;
            margin-top: 30px;
            font-size: 12px;
            color: #999;
        }

        img {
            max-width: 100px;
        }
    </style>
</head>

<body>
    <div class="invoice-box">
        <!-- Company Information -->
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title">
                                <img src="https://yourcompany.com/logo.png" alt="Company Logo"
                                    style="max-width: 150px;">
                            </td>
                            <td class="company-info">
                                <strong>ISHI</strong><br>
                                Address Line 1<br>
                                Email: info@ishicompany.com<br>
                                Phone: +1 555-555-5555
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <!-- Invoice Information -->
            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                                <strong>Invoice To:</strong><br>
                                Customer Name: {{ $data->name }}<br>
                                Address: {{ $data->rec_address }}<br>
                                Phone: {{ $data->phone }}
                            </td>
                            <td>
                                <strong>Invoice #:</strong> INV-{{ $data->id }}<br>
                                <strong>Invoice Date:</strong> {{ now()->format('Y-m-d') }}<br>
                                <strong>Due Date:</strong> {{ now()->addDays(14)->format('Y-m-d') }}
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <!-- Product Information -->
            <tr class="heading">
                <td>Product</td>
                <td>Price</td>
            </tr>
            <tr class="item">
                <td>{{ $data->product->title }}</td>
                <td>${{ number_format($data->product->price, 2) }}</td>
            </tr>
            <tr class="item">
                <td>Quantity</td>
                <td>1</td>
            </tr>
            <!-- Product Image (Optional) -->
            @if ($data->product->image)
                <tr class="item">
                    <td colspan="2">
                        <img src="{{ asset('products/' . $data->product->image) }}" alt="Product Image">
                    </td>
                </tr>
            @endif
            <!-- Total Price -->
            <tr class="total">
                <td></td>
                <td>Total: ${{ number_format($data->product->price, 2) }}</td>
            </tr>
        </table>
        <!-- Footer -->
        <div class="footer">
            Thank you for your business!<br>
            Please make the payment by the due date.
        </div>
    </div>
</body>

</html>
