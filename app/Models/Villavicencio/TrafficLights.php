<?php

namespace App\Models\Villavicencio;

use App\Traits\Points\HasPoints;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrafficLights extends Model
{
    use HasFactory, HasPoints;

    protected $table = 'traffic_lights';

	protected $primaryKey = 'id';

	public $timestamps = true;

	protected $guarded = [];

	private $slug = 'trafficLight';

	private $cacheKeyMarker = 'traffic_lights_marker';

	protected $hidden = [];

	private function pointProperties()
    {
        return [];
    }

	public function getCacheKeyMarker()
	{
		return $this->cacheKeyMarker;
	}
}
