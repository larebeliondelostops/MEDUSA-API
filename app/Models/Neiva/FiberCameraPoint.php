<?php

namespace App\Models\Neiva;

use App\Traits\Points\HasPoints;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FiberCameraPoint extends Model
{
    use HasFactory, HasPoints;

    protected $table = 'fiber_cameras_points';

    private $slug = 'fiber_optic_cameras';

    private $cacheKeyMarker = 'fiber_cameras_neiva_marker';

    private function pointProperties()
    {
        return [];
    }

    public function getCacheKeyMarker()
    {
        return $this->cacheKeyMarker;
    }
}
