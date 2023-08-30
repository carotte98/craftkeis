<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactFormMail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

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

        // Create Logs in admin.log
        Log::channel('admin')->info("New Email send via Contact Form");

        // Redirect or respond back
        return redirect('/contact')->with('message', 'Your message has been sent successfully!');
    }

}
