<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;

class StripeController extends Controller
{
    public function index(){
        return view('stripe');
    }
    public function checkout(Request $request){
        Stripe::setApiKey(config('services.stripe.sk'));
        $customsPayload = [
            'email' => $request->input('email'),
            'name' => $request->input('name'),
        ];
        $customer = \Stripe\Customer::create($customsPayload);
        $session = \Stripe\Checkout\Session::create([
            'customer' => $customer->id,
            'success_url' => route('success'),
            'cancel_url' => route('cancel'),
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'usd',
                        'product_data' => [
                            'name' => 'T-shirt',
                        ],
                        'unit_amount' => 2000,
                    ],
                    'quantity' => 1,
                ]
            ],
            'mode' => 'payment'
        ]);

        return redirect()->away($session->url);
    }

    public function success(){
        return view('stripe');
    }

    public function cancel(Request $request){
        dd($request->all());
    }
}
