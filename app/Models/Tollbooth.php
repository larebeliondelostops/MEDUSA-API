<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tollbooth extends Model
{
    use HasFactory;

    protected $table = 'tollbooth';

    protected $fillable = [
        'uuid', 'id_peaje', 'name', 'state', 'project', 'electronic', 'cod_via', 'pr', 'department', 'municipality', 'coordinates'
    ];
}