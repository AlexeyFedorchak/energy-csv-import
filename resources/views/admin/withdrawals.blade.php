<!-- withdrawals.blade.php -->

@extends('layouts.layoutMaster')

@section('title', 'Admin Withdrawals')

@section('content')
    <h1>Withdrawals</h1>

    <table class="table">
        <thead>
            <tr>
                <th>User ID</th>
                <th>Amount</th>
                <th>Paid Out</th>
                <th>PayPal Email</th>
                <th>Created At</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($withdrawalRequests as $withdrawal)
                <tr>
                    <td>{{ $withdrawal->user_id }}</td>
                    <td>{{ $withdrawal->amount }}</td>
                    <td>
                        @if($withdrawal->paid_out)
                            <span class="badge badge-success">Paid</span>
                        @else
                            <span class="badge badge-warning">Unpaid</span>
                        @endif
                    </td>
                    @php
                        // Get the user's PayPal email from payment_details table
                        $userPaymentDetails = \App\Models\PaymentDetail::where('user_id', $withdrawal->user_id)->first();
                    @endphp
                    <td>{{ $userPaymentDetails ? $userPaymentDetails->paypal_email : 'N/A' }}</td>
                    <td>{{ $withdrawal->created_at }}</td>
                    <td>
                        @if(!$withdrawal->paid_out)
                            <form action="{{ route('admin.markPaid', ['id' => $withdrawal->id]) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-sm btn-primary">Mark as Paid</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
