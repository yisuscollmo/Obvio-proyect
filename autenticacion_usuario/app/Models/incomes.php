<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class incomes extends Model
{
    use HasFactory;
    protected $fillable = [
        'date',
        'income_number',
        'providers_id',
        'subtotal',
        'iva',
        'total',
    ];
    
}
