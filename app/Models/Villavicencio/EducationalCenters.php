<?php

namespace App\Models\Villavicencio;

use App\Traits\Points\HasPoints;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EducationalCenters extends Model
{
    use HasFactory, HasPoints;

    /**
	 * Defines the table associated with the model.
	 * @var string
	 */
    protected $table = 'educational_centers';

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

	private $slug = 'educational_centers';

    private $cacheKeyMarker = 'educational_centers_villavicencio_marker';

    private function pointProperties()
    {
        return [];
    }

    public function getCacheKeyMarker()
    {
	}
}

