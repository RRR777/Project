<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Product;

class Order extends Model
{
    public function products()
    {
        return $this->belongsToMany(Product::class, 'orderdetails')->withPivot('price', 'quantity', 'created_at', 'updated_at');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
