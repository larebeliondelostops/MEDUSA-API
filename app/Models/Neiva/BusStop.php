<?php

namespace App\Models\Neiva;

use App\Traits\Points\HasPoints;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BusStop extends Model
{
    use HasFactory, HasPoints;

    protected $table = 'bus_stops';

    private function pointProperties()
    {
        return [];
    }
}
