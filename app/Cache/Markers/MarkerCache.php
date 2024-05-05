<?php

namespace App\Cache\Markers;

use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;
use App\Interfaces\Markers\PointsInterface;

class MarkerCache implements PointsInterface
{
    const TTL = 864000;

    private $key;

    public function __construct(
        protected PointsInterface $strategy
    )
    {
        $this->strategy = $strategy;
        $this->key = $strategy->getModel()->getCacheKeyMarker();
    }

    public function getModel(): Model
    {
        return $this->strategy->getModel();
    }

    public function allPoints()
    {
        return Cache::remember($this->key, self::TTL, function() {
            return $this->strategy->allPoints();
        });
    }

    public function getInfoPoint($id)
    {
        return $this->strategy->getInfoPoint($id);
    }
}