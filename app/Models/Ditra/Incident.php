<?php

namespace App\Models\Ditra;

use App\Traits\Points\HasPoints;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Incident extends Model
{
    use HasFactory, HasPoints;

    protected $table = 'incident';

    protected $guarded = [];

    private $slug = 'incident';

    private $cacheKeyMarker = 'incident__ditra_marker';

    public function Indicator()
    {
        return $this->belongsTo(Indicator::class, 'indicator_id');
    }

    private function pointProperties()
    {
        return [];
    }

    public function getCacheKeyMarker()
    {
        return $this->cacheKeyMarker;
    }
}
