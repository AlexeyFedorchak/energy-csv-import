<!DOCTYPE html>
<html>
<head>
    <style>
        /* Add your CSS styles for the invoice here */
    </style>
</head>
<body>
    <h1>Invoice</h1>
    <p>User ID: {{ $invoiceData->user_id }}</p>
    <p>Month: {{ $invoiceData->month->format('F Y') }}</p>
    <p>Revenue: ${{ $invoiceData->revenue }}</p>
    <!-- Add more invoice details as needed -->

    @if ($invoiceData->revenue >= 100)
        <form action="{{ route('withdraw') }}" method="POST">
            @csrf
            <input type="hidden" name="userId" value="{{ $invoiceData->user_id }}">
            <button type="submit">Withdraw</button>
        </form>
    @endif
</body>
</html>
