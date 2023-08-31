<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank_details extends Model
{
    use HasFactory;

    protected $table = 'bank_details';

    protected $fillable = [
        'user_id',
        'firstName',
        'lastLame',
        'cardNumber',
        'ccv',
        'expireDate',
        'payment_method',
    ];

    public function user()
       {
        return $this->belongsTo(User::class, 'user_id');
    }


}
