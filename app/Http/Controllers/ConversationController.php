<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Message;
use App\Models\Conversation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ConversationController extends Controller
{
    public function createChat($contactId)
    {
        $user = auth()->user();
        $contact = User::find($contactId);

        //If user does not write to himself then
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

        return redirect('/users/account');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($contactId)
    {
        $user = auth()->user();

        //Get the exact conversation
        $conversation = Conversation::where([
            ['user_id1', $user->id],
            ['user_id2', $contactId],
        ])->orWhere([
            ['user_id1', $contactId],
            ['user_id2', $user->id],
        ])->first();

        return view('chat.window', [
            'user' => $user,
            'contact' => DB::table('users')->find($contactId),
            'messages' => $conversation->messages, // Fetch all messages associated with the conversation
            'conversationId' => $conversation->id,
        ]);
    }

    public function pollConversation($conversationId)
    {
        // Retrieve the conversation using the provided conversation ID
        $conversation = Conversation::find($conversationId);

        // Fetch all messages associated with the conversation
        $messages = $conversation->messages;

        // Loop through messages and add the user's name to each message
        foreach ($messages as $message) {
            $message->user_name = $message->users->name;
        }

        // Return the updated conversation data as JSON
        return response()->json([
            'messages' => $messages,
        ]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Conversation $conversation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Conversation $conversation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Conversation $conversation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Conversation $conversation)
    {
        //
    }
}
