<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank_details extends Model
{
    use HasFactory;
    
    protected $table = 'bank_details';

    protected $fillable = [
        'bank_id',
        'user_id',
        'payment_method',
        'account_details',
    ];

}
