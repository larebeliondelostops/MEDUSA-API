<?php

namespace App\Models\Neiva;

use App\Traits\Points\HasPoints;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FiberCameraPoint extends Model
{
    use HasFactory, HasPoints;

    protected $table = 'fiber_cameras_points';

    private function pointProperties()
    {
        return [];
    }
}
