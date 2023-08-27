<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Alarms extends Model
{
    protected $table = 'alarms';
    
    use HasFactory;

    protected $guarded = [];

    protected $keyType = 'string';
    public $incrementing = true; // Indica que el campo 'id' es autoincremental
    protected $fillable = ['uuid', 'name', 'address', 'pointCoordinates'];
    

}
