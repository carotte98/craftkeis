<?php

namespace App\Http\Controllers;

use App\Models\Bank_details;
use Illuminate\Http\Request;

class BankDetailsController extends Controller
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
        return view('users.bankDetails');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $formFields =$request->validate([
            'firstName'=>['required'],
            'lastName'=>['required'],
            'cardNumber'=>['required'],
            'payment_method'=>['required'],
            'ccv'=>['required'],
            'expireDate'=>['required']
        ]);
        $formFields['user_id']=auth()->user()->id;

        Bank_details::create($formFields);

        return redirect('/')->with('message','Account and bank Details created');

    }

    /**
     * Display the specified resource.
     */
    public function show(Bank_details $bank_details)
    {
        return view('components.dashboard-bank', [
            'bank_details' => $bank_details
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bank_details $bank_details)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bank_details $bank_details)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bank_details $bank_details)
    {
        //
    }
}
