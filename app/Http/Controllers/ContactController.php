<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;

class ContactController extends Controller
{
    public function showForm()
    {
        return view('contactForm');
    }

    public function sendMail(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        // Send the email
        Mail::to('craftkeis.devs@gmail.com')->send(new ContactFormMail($validatedData));

        // Redirect or respond back
        return redirect('/contact')->with('message', 'Your message has been sent successfully!');
    }

}
