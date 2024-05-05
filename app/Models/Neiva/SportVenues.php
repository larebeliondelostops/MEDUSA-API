<?php

namespace App\Models\Neiva;

use App\Traits\Points\HasPoints;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SportVenues extends Model
{
    use HasFactory, HasPoints;

    protected $table = 'sports_venues';

    private $slug = 'sports_venues';

    private $cacheKeyMarker = 'sports_venues_neiva_marker';

    private function pointProperties()
    {
        return [];
    }

    public function getCacheKeyMarker()
    {
        return $this->cacheKeyMarker;
    }
}
