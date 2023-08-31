<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    public function scopeFilter($query, array $filters){

        if ($filters['category_id'] ?? false )
        {
            $query->where('category_id', 'like', '%' . $filters['category_id'] . '%');
        } 

        if ($filters['search'] ?? false )
        {
            $keywords = explode(' ' , $filters['search']);

            foreach ($keywords as $keyword) {
                $query->where('category_id', 'like', '%' . $keyword . '%')->orWhere('title', 'like', '%' . $keyword . '%')->orWhere('description', 'like', '%' . $keyword . '%');
            }
        } 
    }
    
    public function categories(){
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function users(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function order() {
        return $this->belongsTo(Order::class);
    }

}

