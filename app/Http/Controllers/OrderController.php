<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('orders.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $table->id();
        // $table->string('title');
        // $table->foreignId('user_id1')->constrained()->onDelete('cascade');;
        // $table->foreignId('user_id2')->constrained()->onDelete('cascade');;
        // $table->foreignId('service_id')->constrained()->onDelete('cascade');;
        // $table->enum('order_status', ['finished', 'pending', 'accepted']);
        // $table->timestamp('completed_at');

        $formFields = $request->validate([
            'title' => 'required',
        ]);
    
        $formFields['user_id1'] = auth()->id();
        $formFields['order_status'] = 'pending';
    
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
