<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function userClient() {
        return $this->belongsTo(Order::class, 'user_id1');
    }

    public function userCreator() {
        return $this->belongsTo(Order::class, 'user_id2');
    }

    public function service() {
        return $this->belongsTo(Order::class, 'service_id');
    }

    public function bank() {
        return $this->belongsTo(Order::class, 'bank_id');
    }
}
