<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // model part of the mvc
    protected $fillable = [
        'name',
        'quantity',
        'price',
        'description'
    ];
}
