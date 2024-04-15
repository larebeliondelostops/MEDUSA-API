<?php

namespace App\Models\Neiva;

use App\Traits\Points\HasPoints;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Lighting extends Model
{
    use HasFactory, HasPoints;

    protected $table = 'lighting';

    private function pointProperties()
    {
        return [];
    }
}
