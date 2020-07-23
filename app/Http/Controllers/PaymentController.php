<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cartalyst\Stripe\Stripe;

class PaymentController extends Controller
{
    public function store(Request $request){

        $email = $request->input('email');
        $this->validate($request, [
            'email' => 'required',
        ]);

        $stripe = Stripe::make('sk_test_51H7F0TLIzvDELGLjl5dcMKGVizR1EWAPun9to8tC8QmRLhgnW27NTJ5IpawT9knVmvKF4EnHgkvUyt1PwtWmEcXa00a9PXIyEw', '2020-03-02'); // used Stripe secret key, not Publishable key
        $charge = $stripe->charges()->create([
            'amount'   => 200,
            'currency' => 'USD',
            'source' => $request->stripeToken,
            'receipt_email' => $email,
        ]);
        session()->forget("user.items");
        return redirect('home')->with(["msg" => "Payment Created"]);

    }
}
