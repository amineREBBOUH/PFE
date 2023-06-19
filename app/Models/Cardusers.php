<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cardusers extends Model
{
    use HasFactory;
    protected $fillable = [
        'card_id',
        'product_id'
    ];
    protected $table = 'card_users';

}
