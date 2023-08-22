<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    use HasFactory;

    protected $table = 'conversations';

    protected $fillable = [
        'user1_id',
        'user2_id',
    ];

    public function messages(){
        return $this->hasMany(Message::class, 'message_id');
    }
    public function user1(){
        return $this->belongsTo(Message::class);
    }
    public function user2(){
        return $this->belongsTo(Message::class);
    }
}
