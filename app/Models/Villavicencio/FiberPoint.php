<?php

namespace App\Models\Villavicencio;

use App\Traits\Points\HasPoints;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FiberPoint extends Model
{
    use HasFactory, HasPoints;

    protected $table = 'fiber_points';

    private $slug = 'fiber';

    private $cacheKeyMarker = 'fiber_marker';

    protected $guarded = [];

    private function pointProperties()
    {
        return [];
    }

    public function getCacheKeyMarker()
    {
        return $this->cacheKeyMarker;
    }
}
