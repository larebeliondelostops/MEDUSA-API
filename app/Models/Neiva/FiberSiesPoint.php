<?php

namespace App\Models\Neiva;

use App\Traits\Points\HasPoints;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FiberSiesPoint extends Model
{
    use HasFactory, HasPoints;

    protected $table = 'fiber_sies_points';

    private $slug = 'fiber_optic_sies';

    private $cacheKeyMarker = 'fiber_sies_neiva_marker';

    private function pointProperties()
    {
        return [];
    }

    public function getCacheKeyMarker()
    {
        return $this->cacheKeyMarker;
    }
}
