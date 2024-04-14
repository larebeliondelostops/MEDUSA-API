<?php

namespace App\Models\Neiva;

use App\Traits\Points\HasPoints;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TrafficLight extends Model
{
    use HasFactory, HasPoints;

    protected $table = 'traffic_light';

    private function pointProperties()
    {
        return [];
    }
}
