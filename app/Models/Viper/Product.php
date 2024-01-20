<?php

namespace App\Models\Viper;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = [
        'number'
    ];
}
