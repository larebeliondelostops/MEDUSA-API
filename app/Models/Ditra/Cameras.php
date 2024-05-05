<?php

namespace App\Models\Ditra;

use App\Traits\Points\HasPoints;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cameras extends Model
{
    use HasFactory, HasPoints;

    protected $table = 'cameras';

    private $slug = 'camera';

    private $cacheKeyMarker = 'cameras__ditra_marker';

    private $specialType = 1;

    protected $guarded = [];

    private function pointProperties()
    {
        return [
            'specialType' => $this->specialType,
            'url' => $this->url
        ];
    }

    public function getCacheKeyMarker()
    {
        return $this->cacheKeyMarker;
    }
}
