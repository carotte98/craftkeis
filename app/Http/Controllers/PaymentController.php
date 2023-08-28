<?php

namespace App\Http\Controllers;

use Exception;
use Stripe\Charge;
use Stripe\Stripe;
use Stripe\PaymentIntent;
use Illuminate\Http\Request;
use Stripe\Checkout\Session;


class PaymentController extends Controller
{
    public function session(Request $request)
    {
        \Stripe\Stripe::setApiKey(config('stripe.sk'));

        
        $productname=$request->get('service_name');
        $totalprice=$request->get('total');
        $two0="00";
        $total="$totalprice$two0";

        $session = \Stripe\Checkout\Session::create([
            'line_items' =>[
                [
                    'price_data'=>[
                        'currency'      =>  'EUR',
                        'product_data'  =>  [
                            'name' =>   $productname,
                        ],
                        'unit_amount'   =>  $total,   
                    ],
                    'quantity'      => 1,
                ],
            ],
            'payment_method_types' => ['card'],
            'mode'        => 'payment',
            'success_url' => url('/success'),
            'cancel_url'  => url('/'),    

        ]);

        return redirect()->away($session->url);
    }

    public function success()
    {
        return view('/')->with('message','Payment successfull');
    }
        
}

