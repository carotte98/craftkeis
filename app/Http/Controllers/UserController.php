<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

use function Laravel\Prompts\password;

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

    //attributes have certain specififcations some don't
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'bank_id' => ['nullable'],
            'password' => ['required', Password::min(6)->mixedCase()->numbers()->symbols()],
            'bio' => ['nullable'],
            'is_creator' => ['nullable'],
            'image_address' => ['nullable'],
            'phone_number' => ['nullable'],
            'commission_amount' => ['nullable']
        ]);

        //for the images storing them apart locally
        if ($request->hasFile('image_address')) {
            $formFields['image_address'] = $request->file('image_address')->store('images', 'public');
            //formfields['logo']->this will add a 'logo' key to our array of data from the form
            //$request->file('logo') >> retrieve the image file that has been uploaded(could be any file really)
            //store('logos','public') > the file will be stored in
            //public/logos/ instead of just public
        }

        //Hash the password with bcrypt 
        $formFields['password'] = bcrypt($formFields['password']);

        // You can explicitly set the attributes to their default values if they are not provided
        $formFields['bio'] = $formFields['bio'] ?? null;
        $formFields['is_creator'] = $formFields['is_creator'] ?? null;
        $formFields['bank_id'] = $formFields['bank_id'] ?? null;
        $formFields['commission_amount'] = $formFields['commission_amount'] ?? null;




        //Create the new user
        $user = User::create($formFields);


        //TODO
        //Using auth() helper handles all the login/logout process for us
        //It saves us an ENORMUS amount of time
        auth()->login($user);

        //When user is created and logged in, we will show them the homepage so they can start navigate the website
        return redirect('/')->with('message', 'User created and logged in!');
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

        //Search for all conversations where user is present
        $conversations = DB::table('conversations')
            ->where('user_id1', $user->id)
            ->orWhere('user_id2', $user->id)
            ->get();

        $contactUsers = [];

        //For each conversation put the other contact(user) in an array 
        foreach ($conversations as $conversation) {
            $contactUserId = $conversation->user_id1 == $user->id ? $conversation->user_id2 : $conversation->user_id1;
            $contactUser = DB::table('users')->find($contactUserId);

            // Append the other user's details to the $otherUsers array
            $contactUsers[] = $contactUser;
        }

        // Pass the user data to the view
        return view('users.account', [
            'user' => $user,
            'tempContacts' => User::all(), //Temporary for chat purpose
            'contacts' => $contactUsers,
        ]);
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
    public function update(Request $request, User $user)
    {
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')->ignore($user->id)],
            'bank_id' => ['nullable'],
            'password' => ['required', Password::min(6)->mixedCase()->numbers()->symbols()],
            'bio' => ['nullable'],
            'is_creator' => ['nullable'],
            'image_address' => ['nullable'],
            'phone_number' => ['nullable'],
            'commission_amount' => ['nullable']
        ]);
        $user->update($formFields);

        return redirect('/users/' . $user->id)->with('message', 'Account updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
