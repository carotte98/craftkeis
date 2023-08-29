<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Message;
use App\Models\Service;
use App\Models\Conversation;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use function Laravel\Prompts\password;
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

    //attributes have certain specififcations some don't
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            // 'bank_id' => ['nullable'],
            'password' => ['required', Password::min(6)->mixedCase()->numbers()->symbols()],
            'bio' => ['nullable'],
            'is_creator' => ['nullable'],
            'image_address' => ['nullable'],
            'phone_number' => ['nullable'],

        ]);

        //for the images storing them apart locally
        if ($request->hasFile('image_address')) {
            $formFields['image_address'] = $request->file('image_address')->store('images', 'public');
            //formfields['logo']->this will add a 'logo' key to our array of data from the form
            //$request->file('logo') >> retrieve the image file that has been uploaded(could be any file really)
            //store('logos','public') > the file will be stored in
            //public/logos/ instead of just public
        }


        //validation, to check if passwords match or not
        if ($request->confirm_password == $formFields['password']) {
            //Hash the password with bcrypt 
            $formFields['password'] = bcrypt($formFields['password']);

            // You can explicitly set the attributes to their default values if they are not provided
            $formFields['bio'] = $formFields['bio'] ?? null;
            $formFields['is_creator'] = $formFields['is_creator'] ?? null;
            // $formFields['bank_id'] = $formFields['bank_id'] ?? null;
            // Set is_creator value based on checkbox
            $formFields['is_creator'] = isset($formFields['is_creator']) ? 1 : 0;

            //Create the new user
            $user = User::create($formFields);
            auth()->login($user);

            if ($user->is_creator) {
                session_start();
                session(['user' => $user]);
                return redirect('/register/{user}/bankDetails');
            }

            //When user is created and logged in, we will show them the homepage so they can start navigate the website
            return redirect('/')->with('message', 'User created and logged in!');
        } else {
            return back()->withErrors([
                'confirm_password' => "Passwords don't match",
                'password' => "Passwords don't match"
            ]);
        }
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
            return redirect('/')->with('message', 'You are now logged in!');
        }

        //Go back to login form with error message for 'email' field
        //withErrors() allows to pass an error message instead of a flash message
        return back()->withErrors(['email' => 'Invalid credentials...']);
    }

    public function account()
    {

        // Get the currently authenticated user
        $user = Auth::user();
        // Check if the currently authenticated user matches the requested user
        if (Auth::user()->id !== $user->id) {
            abort(403, 'Unauthorized'); // Return a 403 Forbidden response
        }
        //*Admin
        if ($user->email === 'craftkeis.devs@gmail.com') {
            // Create a conversation with every user for admin login
            $allUsers = User::get();
            foreach ($allUsers as $contact) {
                //If user does not write to himself then
                // dd($contact->id);
                if ($user->id != $contact->id) {
                    //In short, get that one specific conversation where user and contact is present
                    $conversation = Conversation::where([
                        ['user_id1', $user->id],
                        ['user_id2', $contact->id],
                    ])->orWhere([
                        ['user_id1', $contact->id],
                        ['user_id2', $user->id],
                    ])->first();
                    //If the conversation does not exist then create it
                    if (!$conversation) {
                        $conversation = Conversation::create([
                            'user_id1' => $user->id,
                            'user_id2' => $contact->id,
                        ]);
                    }
                }
            }
        } //* END ADMIN
        //Search for all conversations where user is present
        $conversations = DB::table('conversations')
            ->where('user_id1', $user->id)
            ->orWhere('user_id2', $user->id)
            ->get();

        $contactUsers = [];

        //Search for first conversation of user
        $firstConversation = Conversation::where('user_id1', $user->id)
            ->orWhere('user_id2', $user->id)
            ->first();

        //For each conversation put the other contact(user) in an array 
        foreach ($conversations as $conversation) {
            $contactUserId = $conversation->user_id1 == $user->id ? $conversation->user_id2 : $conversation->user_id1;
            $contactUser = DB::table('users')->find($contactUserId);

            //Get exact conversation id for that user
            $conversation = Conversation::where([
                ['user_id1', $user->id],
                ['user_id2', $contactUser->id],
            ])->orWhere([
                ['user_id1', $contactUser->id],
                ['user_id2', $user->id],
            ])->first();

            // Append the other user's details along with the conversation ID
            $contactUser->conversation_id = $conversation->id;
            $contactUsers[] = $contactUser;
            // dd($contactUser);
        }

        //*ADMIN
        // If user is admin then return admin dashboard view
        if ($user->email === 'craftkeis.devs@gmail.com') {
            return view('users.admin', [
                // 'queries' => $queries,
                'services' => Service::all(),
                'orders' => Order::all(),
                'conversations' => Conversation::with(['user1', 'user2'])->get(),
                'users' => User::all(),
                'contacts' => $contactUsers,
            ]);
        }
        //*END ADMIN

        // Pass the user data to the view
        return view('users.account', [
            'user' => $user, //Can be removed
            'conversationId' => $firstConversation ? $firstConversation->id : "", //First conversations user has
            //'messages' => $messages,
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
    public function show(User $user)
    {
        // Check if the currently authenticated user matches the requested user
        if (Auth::user()->id !== $user->id) {
            abort(403, 'Unauthorized'); // Return a 403 Forbidden response
        }
        return view('users.creator', [
            'user' => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {

        // Check if the currently authenticated user matches the requested user
        if (Auth::user()->id !== $user->id) {
            abort(403, 'Unauthorized'); // Return a 403 Forbidden response
        }

        return view('users.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        // Check if the currently authenticated user matches the requested user
        if (Auth::user()->id !== $user->id) {
            abort(403, 'Unauthorized'); // Return a 403 Forbidden response
        }
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')->ignore($user->id)],
            'password' => ['required', Password::min(6)->mixedCase()->numbers()->symbols()],
            'bio' => ['nullable'],
            'is_creator' => ['nullable'],
            'image_address' => ['nullable'],
            'phone_number' => ['nullable'],
            'commission_amount' => ['nullable']
        ]);

        if ($request->hasFile('image_address')) {
            $formFields['image_address'] = $request->file('image_address')->store('images', 'public');
        }

        $user->update($formFields);

        return redirect('/users/' . $user->id)->with('message', 'Account updated successfully');
    }


    //*ADMIN
    public function destroy(string $userId)
    {
        if (Auth::user()->id !== 1) {
            abort(403, 'Unauthorized'); // Return a 403 Forbidden response
        }
        $user = User::find($userId);
        $user->delete();
        return back()->with('message', 'User deleted successfully.');
    }

    public function showEditUser(string $userId)
    {
        if (Auth::user()->id !== 1) {
            abort(403, 'Unauthorized'); // Return a 403 Forbidden response
        }
        $user = User::find($userId);
        return view('users.admin-edit-user', ['user' => $user]);
    }

    public function showConversation(string $conversationId)
    {
        if (Auth::user()->id !== 1) {
            abort(403, 'Unauthorized'); // Return a 403 Forbidden response
        }
        $messages = Message::where('conversation_id', $conversationId)->get();

        return view('users.admin-show-conversation', [
            'messages' => $messages,
            'conversationId' => $conversationId
        ]);
    }

    public function clearConversation(string $conversationId)
    {
        if (Auth::user()->id !== 1) {
            abort(403, 'Unauthorized'); // Return a 403 Forbidden response
        }
        // Delete all messages with the given conversation ID
        Message::where('conversation_id', $conversationId)->delete();
        return back()->with('message', 'Conversation cleared successfully.');
    }

    public function updateUser(Request $request, User $user)
    {
        // Check if the currently authenticated user matches the requested user
        if (Auth::user()->id !== 1) {
            abort(403, 'Unauthorized'); // Return a 403 Forbidden response
        }
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')->ignore($user->id)],
            'password' => ['required', Password::min(6)->mixedCase()->numbers()->symbols()],
            'bio' => ['nullable'],
            'is_creator' => ['nullable'],
            'image_address' => ['nullable'],
            'phone_number' => ['nullable'],
            'commission_amount' => ['nullable']
        ]);

        if ($request->hasFile('image_address')) {
            $formFields['image_address'] = $request->file('image_address')->store('images', 'public');
        }

        $user->update($formFields);

        return redirect('/users/1' . $user->id)->with('message', 'Account updated successfully');
    }

    public function showCreateUser()
    {
        return view('users.admin-create-user');
    }

    public function createUser(Request $request)
    {
        // Check if the currently authenticated user matches the requested user
        if (Auth::user()->id !== 1) {
            abort(403, 'Unauthorized'); // Return a 403 Forbidden response
        }
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            // 'bank_id' => ['nullable'],
            'password' => ['required', Password::min(6)->mixedCase()->numbers()->symbols()],
            'bio' => ['nullable'],
            'is_creator' => ['nullable'],
            'image_address' => ['nullable'],
            'phone_number' => ['nullable'],

        ]);

        //for the images storing them apart locally
        if ($request->hasFile('image_address')) {
            $formFields['image_address'] = $request->file('image_address')->store('images', 'public');
            //formfields['logo']->this will add a 'logo' key to our array of data from the form
            //$request->file('logo') >> retrieve the image file that has been uploaded(could be any file really)
            //store('logos','public') > the file will be stored in
            //public/logos/ instead of just public
        }


        //validation, to check if passwords match or not
        if ($request->confirm_password == $formFields['password']) {
            //Hash the password with bcrypt 
            $formFields['password'] = bcrypt($formFields['password']);

            // You can explicitly set the attributes to their default values if they are not provided
            $formFields['bio'] = $formFields['bio'] ?? null;
            $formFields['is_creator'] = $formFields['is_creator'] ?? null;
            // $formFields['bank_id'] = $formFields['bank_id'] ?? null;
            // Set is_creator value based on checkbox
            $formFields['is_creator'] = isset($formFields['is_creator']) ? 1 : 0;

            //Create the new user
            $user = User::create($formFields);
            auth()->login($user);

            if ($user->is_creator) {
                session_start();
                session(['user' => $user]);
                return redirect('/register/{user}/bankDetails');
            }

            //When user is created and logged in, we will show them the homepage so they can start navigate the website
            return redirect('/')->with('message', 'User created and logged in!');
        } else {
            return back()->withErrors([
                'confirm_password' => "Passwords don't match",
                'password' => "Passwords don't match"
            ]);
        }
    }
}
