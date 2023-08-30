<?php

namespace App\Http\Controllers;

use App\Models\Bank_details;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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
            'full_name'=>['required'],
            'cardNumber'=>['required','numeric', 'digits:16'],
            // 'payment_method'=>['required'],
            'expireDate'=>['required'],
            'ccv'=>['required','numeric', 'digits:3']
        ]);
        $formFields['user_id']=auth()->user()->id;

        Bank_details::create($formFields);

         // Create Logs in admin.log
         Log::channel('admin')->info("Bank Details Added: USER_ID" . $formFields['user_id']);

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
        // dd($bank_details);
        return view('users.bank-edit', ['bank_details' => $bank_details]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bank_details $bank_details)
    {
        // dd($bank_details);
        // dd($formFields);
        $formFields = $request->validate([
            'full_name'=>['required'],
            'cardNumber'=>['required'],
            'ccv'=>['required'],
            'expireDate'=>['required']
        ]);
        // dd($formFields);

        $bank_details->update($formFields);

        // Create Logs in admin.log
        Log::channel('admin')->info("Bank Details Added: USER_ID" . $formFields['user_id']);

        return redirect('/users/' . $bank_details->user_id)->with('message', 'Bank details updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bank_details $bank_details)
    {
        //
    }
}
