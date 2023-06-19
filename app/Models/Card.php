<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Card extends Model
{
    use HasFactory;
    protected $fillable = [
        'name_Card',
        'user_id'
    ];
    public function products(Type $var = null)
    {
        return $this->belongsToMany(Product::class,'card_users','card_id','product_id')->withPivot('id');;

    }
}
