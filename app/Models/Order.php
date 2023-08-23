<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function userClient() {
        return $this->belongsTo(User::class, 'user_id2');
    }

    public function userCreator() {
        return $this->belongsTo(User::class, 'user_id1');
    }

    public function service() {
        return $this->belongsTo(Service::class, 'service_id');
    }

    public function bank() {
        return $this->belongsTo(BankDetails::class, 'bank_id');
    }
}
