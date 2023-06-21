<?php

namespace App\Models;

use App\Models\Like;
use App\Models\Order;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    public function cards(Type $var = null)
    {
        return $this->belongsToMany(Card::class,'card_users','product_id','card_id')->withPivot('card_id');

    }
    public function Keys(Type $var = null)
    {
        # code...
        return $this->hasMany(Key::class,"product_id","id");
    }
    public function Orders(Type $var = null)
    {
        # code...
        return $this->hasMany(Order::class,"product_id","id");
    }
    public function Likes(Type $var = null)
    {
        # code...
        return $this->hasMany(Like::class,"product_id","id");
    }
}
