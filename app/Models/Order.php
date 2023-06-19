<?php

namespace App\Models;

use App\Models\User;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'user_id'
    ];
    public function Product(Type $var = null)
    {
        # code...
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
    public function user(Type $var = null)
    {
        # code...
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
