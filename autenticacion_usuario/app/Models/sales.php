<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sales extends Model
{
    use HasFactory;
    protected $fillable = [
        'date',
        'users_id',
        'sales_number',
        'state',
        'total',
    ];

}
