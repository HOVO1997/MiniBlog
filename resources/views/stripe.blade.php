@extends('layouts.app')

@section('content')
    <div class="container">
    <div class="links" style="margin-top:20px">
        <script src="https://js.stripe.com/v3/"></script>
        <form action="{{route('stripe.store')}}" method="post" id="payment-form">
            @csrf
            <div class="form-row">
                <label for="card-element">Credit or debit card</label>
                <div style="width: 100%;" id="card-element">
                    <!-- A Stripe Element will be inserted here. -->
                </div>

                <!-- Used to display form errors. -->
                <div id="card-errors" role="alert"></div>
            </div>

            <button style="margin-top: 30px;" id="st-btn">Submit Payment</button>
        </form>
    </div>
    </div>
@endsection
