<?php

namespace App\Models\Neiva;

use App\Traits\Points\HasPoints;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Lighting extends Model
{
    use HasFactory, HasPoints;

    protected $table = 'lightings';

    private $slug = 'public_lighting';

    private $cacheKeyMarker = 'lightings_neiva_marker';

    private function pointProperties()
    {
        return [];
    }

    public function getCacheKeyMarker()
    {
        return $this->cacheKeyMarker;
    }
}
