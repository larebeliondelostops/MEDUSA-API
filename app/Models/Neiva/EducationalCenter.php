<?php

namespace App\Models\Neiva;

use App\Traits\Points\HasPoints;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EducationalCenter extends Model
{
    use HasFactory, HasPoints;

    protected $table = 'educational_centers';

    private $slug = 'educational_centers';

    private $cacheKeyMarker = 'educational_centers_neiva_marker';

    private function pointProperties()
    {
        return [];
    }

    public function getCacheKeyMarker()
    {
        return $this->cacheKeyMarker;
    }
}
