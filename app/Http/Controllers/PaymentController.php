<?php

namespace App\Http\Controllers;

use Exception;
use Stripe\Charge;
use Stripe\Stripe;
use App\Models\User;
use App\Models\Order;
use App\Models\Service;
use Stripe\PaymentIntent;
use Illuminate\Http\Request;
use Stripe\Checkout\Session;


class PaymentController extends Controller
{
    public function session(Request $request)
    {
        \Stripe\Stripe::setApiKey(config('stripe.sk'));


        $productname = $request->get('service_name');
        $totalprice = $request->get('total');
        $newStatus = $request->get('order_id');
        $totalCents = intval($totalprice * 100);
        $two0 = "00";
        $total = "$totalprice$two0";

        $session = \Stripe\Checkout\Session::create([
            'line_items' => [
                [
                    'price_data' => [
                        'currency'      =>  'EUR',
                        'product_data'  =>  [
                            'name' =>   $productname,
                        ],
                        'unit_amount'   =>  $totalCents,
                    ],
                    'quantity'      => 1,
                ],
            ],
            'payment_method_types' => ['card'],
            'mode'        => 'payment',
            'success_url' => route('success', ['order' => $newStatus]),
            'cancel_url'  => url('/'),

        ]);

        // dd(route('success', ['order' => $newStatus]));
        return redirect()->away($session->url);
    }

    public function success($order)
    {
        $totalUsers = User::count();
        $totalCreators = User::where('is_creator', true)->count();
        $totalServices = Service::count();

        // Find the order based on the order ID
        $order = Order::find($order);

        if ($order) {
            // Update the order status to 'paid'
            $order->order_status = 'paid';
            // You might also want to update other payment-related fields here
            // For example, updating 'completed_at'
            $order->completed_at = now(); // Update with your specific logic
            $order->save();
        }

        return view('welcome', ['totalUsers' => $totalUsers, 'totalCreators' => $totalCreators, 'totalServices' => $totalServices])->with('message', 'Payment successful');
    }
}
