<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cameras extends Model
{
    protected $table = 'cameras';
    
    use HasFactory;

    protected $guarded = [];
}
