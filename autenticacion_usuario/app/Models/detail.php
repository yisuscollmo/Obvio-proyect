<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detail extends Model
{
    use HasFactory;
    protected $fillable = [
        'dni',
        
        // 'name',
        // 'email',
        'dni_type',
        'adress',
        'phone_number',
        'user_id',
      

    ];
}
