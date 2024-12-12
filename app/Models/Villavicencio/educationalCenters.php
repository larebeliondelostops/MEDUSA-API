<?php

namespace App\Models\Villavicencio;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class educationalCenters extends Model
{
    use HasFactory;

    /**
	 * Defines the table associated with the model.
	 * @var string
	 */
    protected $table = 'educationalC_centers';

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

}

