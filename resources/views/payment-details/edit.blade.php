@extends('layouts.layoutMaster')

@section('title', 'Payment Details')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h2>{{ __('Payment Details') }}</h2></div>

                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('payment-details.update') }}">
                            @csrf
                            @method('PUT')

                            <ul class="nav nav-tabs">
                                <li class="nav-item">
                                    <a class="nav-link active" id="paypal-tab" data-toggle="tab" href="#paypal" role="tab" aria-controls="paypal" aria-selected="true">PayPal</a>
                                </li>
                                <!-- Add more tabs for future payment methods here -->
                            </ul>

                            <div class="tab-content mt-4">
                                <!-- PayPal Tab -->
                                <div class="tab-pane fade show active" id="paypal" role="tabpanel" aria-labelledby="paypal-tab">
                                    <div class="form-group row">
                                        <label for="paypal_email" class="col-md-4 col-form-label text-md-right">{{ __('PayPal Email Address') }}</label>

                                        <div class="col-md-6">
                                            <input id="paypal_email" type="email" class="form-control @error('paypal_email') is-invalid @enderror" name="paypal_email" value="{{ $paymentDetails->paypal_email ?? old('paypal_email') }}" required autocomplete="paypal_email" autofocus>

                                            @error('paypal_email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <!-- Add more tab content for future payment methods here -->

                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Save') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-8 mt-4">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4 class="mb-0">{{ __('Unpaid Earnings') }}</h4>
                            <div>
                                <div class="mb-3">
                                    <small>Withdrawable: ${{ $totalEarnings }}</small>
<br/>
                                    <small>Withdrawn so far: ${{ $totalWithdrawn }}</small>
                                </div>
                            </div>
                        </div>
                    </div>

                        @if (count($earnings) > 0)
                            <form action="{{ route('withdraw-all') }}" method="POST">
                                @csrf
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($earnings as $earning)
                                            <tr>
                                                <td>{{ $earning->date }}</td>
                                                <td>${{ $earning->earning }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                
                            </form>
                        @else
                            <p>No unpaid earnings available.</p>
                        @endif
                        <div class="card-footer">
                        @if ($totalEarnings > 50)
                            <form action="{{ route('withdraw-all') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-primary mt-3">Withdraw All</button>
                            </form>
                        @else
                            <button class="btn btn-primary mt-3 disabled" title="Withdrawal will be possible once you reach $20">Withdraw All</button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Add event listener to show tooltip on hover
        const button = document.querySelector('.btn.disabled');
        button.addEventListener('mouseenter', () => {
            button.setAttribute('title', 'Withdrawal will be possible once you reach $50');
        });
    </script>
@endsection
