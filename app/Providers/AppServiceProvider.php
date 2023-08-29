<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Conversation;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Model::unguard();
        //Enable Logging
        DB::listen(function($query) {
            Log::info(
                $query->sql,
                [
                    'bindings' => $query->bindings,
                    'time' => $query->time
                ]
            );
        });

        // Share data with the layout view
        View::composer('components.layout', function ($view) {
            if (auth()->check()) {
                $user = auth()->user();

                $conversations = DB::table('conversations')
                    ->where('user_id1', $user->id)
                    ->orWhere('user_id2', $user->id)
                    ->get();

                $contactUsers = [];
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

                $view->with([
                    'conversations' => $conversations,
                    'contactUsers' => $contactUsers,
                ]);
            }
        });
    }
}
