<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];

    public function products(){
        return $this->belongsToMany(Product::class)->withPivot('quantity');
    }

    public function status(){
        return $this->belongsTo(OrderStatus::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
