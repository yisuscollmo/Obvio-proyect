<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    use HasFactory;
    protected $fillable = [
        'dni',
        'name',
        'email',
        'dni_type',
        'address',
        'phone_number',
        

    ];
}
