<!DOCTYPE html>
<html>
<head>
    <title>Invoices</title>
    <style>
        /* Add your custom styles here */
        body {
            font-family: Arial, sans-serif;
        }

        .invoice {
            margin-bottom: 20px;
            padding: 20px;
            border: 1px solid #ccc;
            background-color: #f9f9f9;
        }

        .invoice h3 {
            margin-top: 0;
        }

        .invoice p {
            margin-bottom: 5px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Invoices</h1>

    @if ($totalEarnings >= 100)
        <p>Withdrawal Button Enabled</p>
        <form action="{{ route('withdraw') }}" method="POST">
            @csrf
            <input type="hidden" name="userId" value="{{ $earnings->first()->user_id }}">
            <input type="hidden" name="revenue" value="{{ $totalEarnings }}">
            <button type="submit">Withdraw</button>
        </form>
    @else
        <p>Total Earnings: ${{ $totalEarnings }}</p>
        <p>Withdrawal Button Disabled (Earnings must reach $100)</p>
    @endif

    <table>
        <tr>
            <th>Date</th>
            <th>Invoice ID</th>
            <th>Amount</th>
        </tr>
        @foreach ($earnings as $earning)
        <tr>
            <td>{{ $earning->date }}</td>
            <td>{{ $earning->id }}</td>
            <td>${{ $earning->amount }}</td>
        </tr>
        @endforeach
    </table>
</body>
</html>
