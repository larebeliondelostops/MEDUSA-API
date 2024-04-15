<?php

namespace App\Models\Ditra;

use App\Traits\Points\HasPoints;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tollbooth extends Model
{
    use HasFactory, HasPoints;

    protected $table = 'tollbooth';

    protected $fillable = [
        'uuid', 'id_peaje', 'name', 'state', 'project', 'electronic', 'cod_via', 'pr', 'department', 'municipality', 'coordinates'
    ];

    private function pointProperties()
    {
        return [];
    }
}