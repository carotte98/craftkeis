<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $table = 'messages';

    protected $fillable = [
        'conversation_id',
        'sender_id',
        'message_content'
    ];

    public function conversations(){
        return $this->belongsTo(Conversation::class, 'conversation_id');
    }

    public function users(){
        return $this->belongsTo(User::class, 'sender_id');
    }
}
