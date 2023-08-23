<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
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
        return view('users.register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', Password::min(6)->mixedCase()->numbers()->symbols()]
        ]);

        //Hash the password with bcrypt 
        $formFields['password'] = bcrypt($formFields['password']);

        //Create the new user
        $user = User::create($formFields);

        //TODO
        //Using auth() helper handles all the login/logout process for us
        //It saves us an ENORMUS amount of time
        //auth()->login($user);

        //When user is created and logged in, we will show them the homepage so they can start navigate the website
        return redirect('/'); //->with('message', 'User created and logged in!');
    }

    public function login()
    {
        return view('users.login');
    }

    public function authenticate(Request $request)
    {
        //Validate form fields 
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        //If it found a matching user, it will log in automatically
        if (auth()->attempt($formFields)) {
            //Genereate a new session (to store the logged user data)
            $request->session()->regenerate();

            //Redirect to account page for now
            return redirect('users/account'); //->with('message', 'You are now logged in!');
        }

        //Go back to login form with error message for 'email' field
        //withErrors() allows to pass an error message instead of a flash message
        return back()->withErrors(['email' => 'Invalid credentials...']);
    }

    public function account()
    {
        // Get the currently authenticated user
        $user = Auth::user();
        // Pass the user data to the view
        return view('users.account', ['user' => $user]);
    }

    //Logout user
    public function logout(Request $request)
    {
        //Log user out
        auth()->logout();

        //This will remove the user from our session
        //Additionnal requirement to invalidate their session and need to regenerate the user token
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/'); //->with('message', 'You have been logged out!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('users.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
