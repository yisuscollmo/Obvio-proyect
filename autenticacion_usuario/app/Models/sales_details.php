<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sales_details extends Model
{
    use HasFactory;
    protected $fillable = [
        'articles_id',
        'sales_id',
        'users_id',
        'amount',
        'price',
        'subtotal',
        'iva',
        'total',
        
        

    ];
}
