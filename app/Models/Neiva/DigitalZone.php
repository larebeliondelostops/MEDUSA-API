<?php

namespace App\Models\Neiva;

use App\Traits\Points\HasPoints;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DigitalZone extends Model
{
    use HasFactory, HasPoints;

    protected $table = 'digital_zones';

    private $slug = 'digital_zones';

    private $cacheKeyMarker = 'digital_zones_neiva_marker';

    private function pointProperties()
    {
        return [];
    }

    public function getCacheKeyMarker()
    {
        return $this->cacheKeyMarker;
    }
}
