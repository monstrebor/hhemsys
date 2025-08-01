<!DOCTYPE html>
<html>

<head>
    <title>Receipt #{{ $walkin->id }}</title>
    <style>
        body {
            font-family: sans-serif;
            font-size: 12px;
        }

        .text-center {
            text-align: center;
        }

        .border-bottom {
            border-bottom: 1px solid #ddd;
            margin-bottom: 5px;
        }
    </style>
</head>

<body>
    <h2 class="text-center">My Store</h2>
    <p class="text-center">123 Street, City</p>
    <p class="text-center border-bottom">Receipt #{{ $walkin->id }}</p>

    <p><strong>Date:</strong> {{ $walkin->created_at->format('M d, Y h:i A') }}</p>
    <p><strong>Cashier:</strong> {{ $walkin->cashier->name ?? 'N/A' }}</p>

    <table width="100%" cellspacing="0" cellpadding="5" border="1">
        <thead>
            <tr>
                <th>Product</th>
                <th>Qty</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            @foreach($walkin->items as $item)
            <tr>
                <td>{{ $item->product->name ?? 'Deleted Product' }}</td>
                <td>{{ $item->quantity }}</td>
                <td>₱{{ number_format($item->price * $item->quantity, 2) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <h3 class="text-center">Total: ₱{{ number_format($walkin->total_amount, 2) }}</h3>
    <p class="text-center">Payment Method: {{ ucfirst($walkin->transaction->payment_method ?? 'Cash') }}</p>
</body>

</html>
