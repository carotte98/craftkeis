<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Service;
use App\Models\Conversation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    // DEVELOPMENT DELETE LATER
    public function loginAsUser($userId)
    {
        $user = User::findOrFail($userId);
        Auth::login($user);

        return redirect('/');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('orders.index', [
            'orders' => Order::latest()->paginate(6),
        ]);
    }

    public function manageClient()
    {
        return view('orders.manageClient', ['orders' => auth()->user()->orderClient()->get()]);
    }

    public function manageCreator()
    {
        return view('orders.manageCreator', ['orders' => auth()->user()->orderCreator()->get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Service $service)
    {
        return view('orders.create', [
            'service' => $service
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'user_id1' => 'required',
            'user_id2' => 'required',
            'service_id' => 'required',
            'price' => 'required',
        ]);

        $formFields['order_status'] = 'pending';
        $formFields['completed_at'] = null;

        // dd($formFields);
        Order::create($formFields);

        //CREATE CONVERSATION BETWEEN USERS
        $user_id1 = $formFields['user_id1'];
        $user_id2 = $formFields['user_id2'];
        //If user does not write to himself then
        if ($user_id1 != $user_id2) {
            //In short, get that one specific conversation where user and contact is present
            $conversation = Conversation::where([
                ['user_id1', $user_id1],
                ['user_id2', $user_id2],
            ])->orWhere([
                ['user_id1', $user_id2],
                ['user_id2', $user_id1],
            ])->first();

            //If the conversation does not exist then create it
            if (!$conversation) {
                $conversation = Conversation::create([
                    'user_id1' => $user_id1,
                    'user_id2' => $user_id2,
                ]);
            }
        }

        return redirect('/')->with('message', 'Order created successfully');
    
        return redirect('/services/index')->with('message', 'Order created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    public function updateStatus(Request $request, Order $order)
    {
        // the creator updates the status of the order
        $newStatus = $request->input('status');

        if ($newStatus === 'accepted' || $newStatus === 'declined' || $newStatus === 'finished') {
            $order->order_status = $newStatus;
            $order->save();

            return redirect()->back()->with('status', 'Order status updated successfully.');
        }

        return redirect()->back()->withErrors('Invalid status update.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        $order->delete();
        return redirect(url()->previous())->with('message', 'Order deleted successfully');
    }
}
