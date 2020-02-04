<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Order;

class Product extends Model
{
    public function orders()
    {
        return $this->belongsToMany(Order::class, 'orderdetails')->withPivot('price', 'quantity', 'created_at', 'updated_at');
    }
}
