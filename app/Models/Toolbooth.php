<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Toolbooth extends Model
{
    use HasFactory;

    protected $table = 'toolbooth';

    protected $fillable = [
        'uuid', 'id_peaje', 'name', 'state', 'project', 'electronic', 'cod_via', 'pr', 'department', 'municipality', 'coordinates'
    ];
}