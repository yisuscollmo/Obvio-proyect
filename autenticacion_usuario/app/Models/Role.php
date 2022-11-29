<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'image',
        'selling_price',
        'stock',
        'description',
        'categories_id',
        'code',
        'active',
        'providers_id'

    ];
}
