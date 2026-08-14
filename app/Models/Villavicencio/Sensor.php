<?php

namespace App\Models\Villavicencio;

use App\Traits\Points\HasPoints;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sensor extends Model
{
    use HasFactory, HasPoints;

    /**
	 * Defines the table associated with the model.
	 * @var string
	 */
    protected $table = 'sensor';

	/**
	 * Defines the primary key of the model.
	 * @var string
	 */
	protected $primaryKey = 'id';

	/**
	 * Indicates if the model has timestamps.
	 * @var string
	 */
	public $timestamps = true;

	/**
	 * The attributes that are mass assignable.
	 * @var array
	 */
	protected $guarded = [];

	/**
	 * The attributes that should be hidden for arrays.
	 * @var array
	 */
	protected $hidden = [];

	private $slug = 'sensor';

    private $cacheKeyMarker = 'sensor_villavicencio_marker';

    private function pointPropertiesToShow()
    {
        return [
            'name' => $this->name,
            'people_count' => $this->people_count,
			'date_record' => $this->date_record
        ];
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

