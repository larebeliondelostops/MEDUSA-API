<?php

namespace App\Models\Neiva;

use App\Traits\Points\HasPoints;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HeadquarterLasCeibasEPN extends Model
{
    use HasFactory, HasPoints;

    protected $table = 'headquarters_las_ceibas_epn';

    private $slug = 'headquarters_las_ceibas_epn';

    private $cacheKeyMarker = 'headquarters_las_ceibas_epn_neiva_marker';

    private function pointProperties()
    {
        return [];
    }

    public function getCacheKeyMarker()
    {
        return $this->cacheKeyMarker;
    }
}
