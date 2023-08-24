<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Service;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('orders.index', [
            'orders' => Order::latest()->paginate(6),
        ]);
    }

    public function manage()
    {
        return view('orders.manage', ['orders' => auth()->user()->orderClient()->get()]);
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
    
        return redirect('/')->with('message', 'Order created successfully');
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
