@extends('layouts.app')

@section('content')
    <div class="container">
    <div class="links" style="margin-top:20px">
        <script src="https://js.stripe.com/v3/"></script>
        <form style="height: 310px;display: flex;justify-content: center;" action="{{route('stripe.store')}}" method="post" id="payment-form">
            @csrf

            <div class="form-row">
                <label for="email">Write your email</label>
                <input placeholder="Email" class="form-control" id="email" type="email" name="email" style="border: none">


                <label for="card-element">Credit or debit card</label>
                <div style="width: 100%;" id="card-element">
                    <!-- A Stripe Element will be inserted here. -->
                </div>

                <!-- Used to display form errors. -->
                <div id="card-errors" role="alert"></div>
                <button style="margin-top: 30px;" id="st-btn">Submit Payment</button>

            </div>

        </form>
    </div>
    </div>
@endsection
