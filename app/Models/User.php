<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable 
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'bio',
        'is_creator',
        'image_address',
        'phone_number',
        'commission_amount',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


    public function bankDetails()
    {
        return $this->belongsTo(BankDetail::class, 'bank_id');
    }

    public function user1Conversation() {
        return $this->hasMany(Conversation::class, 'user_id1');
    }
    public function user2Conversation() {
        return $this->hasMany(Conversation::class, 'user_id2');
    }
    public function messages() {
        return $this->hasMany(Message::class, 'user_id');
    }
    public function orderClient() {
        return $this->hasMany(Order::class, 'user_id2');
    }
    public function orderCreator() {
        return $this->hasMany(Order::class, 'user_id1');
    }
    
    public function services(){
        return $this->hasMany(Service::class, 'user_id');
    }
}
