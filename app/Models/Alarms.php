<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alarms extends Model
{
    protected $table = 'alarms';
    
    use HasFactory;

    protected $guarded = [];
}
