<?php

namespace App\Models\Ditra;

use App\Traits\Points\HasPoints;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DataDitra extends Model
{
    use HasFactory, HasPoints;

    protected $table = 'data_ditra';

    private $slug = 'incident';

    private $cacheKeyMarker = 'data_ditra_marker';

    protected $fillable = [
        'year', 'uuid', 'occurrence_date', 'month', 'day', 'hour', 'hour_range', 'sectional', 'coordinates',
        'assigned', 'identification', 'grade', 'names', 'last_names', 'age', 'age_range', 'gender',
        'marital_status', 'intoxication', 'responsibility', 'plate', 'vehicle_class', 'model', 'cc',
        'service_class', 'insurance', 'inspection', 'license', 'type', 'hypothesis', 'possible_occurrence'
    ];

    public function Indicator()
    {
        return $this->belongsTo(Indicator::class, 'indicator');
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
