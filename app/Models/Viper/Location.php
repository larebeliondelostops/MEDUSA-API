<?php

namespace App\Models\Viper;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Location extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'locations';
    protected $dates = ['deleted_at'];
    protected $keyType = 'string';


    protected $fillable = [
        'id',
        'type',
        'latitude',
        'longitude'
    ];
}
