<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;
    public function product(Type $var = null)
    {
        # code...
        return $this->belongsTo(Product::class,"product_id","id");
    }
}
