<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Income_conts extends Model
{
    use HasFactory;
    protected $fillable = [
        'articles_id',
        'incomes_id',
        'amount',
        'price',
        'total',
        
    

    ];
}
