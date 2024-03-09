<?php

namespace App\Models;

use App\Traits\Points\HasPoints;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ipats extends Model
{
    use HasFactory, HasPoints;

    /**
	 * Defines the table associated with the model.
	 * @var string
	 */
    protected $table = 'ipats';

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

	private $slug = 'ipat';

	public function getMonth()
	{
		// Obtener la fecha en formato 'YYYY-MM-DD' del atributo date_ipat
		$date = $this->date_ipat;

		// Extraer el mes de la fecha
		$month = date('m', strtotime($date));

		// Asignar el mes al atributo month
		$this->month = $month;
	}

	public function getDay()
	{
		// Obtener la fecha en formato 'YYYY-MM-DD' del atributo date_ipat
		$date = $this->date_ipat;

		// Extraer el mes de la fecha
		$day = date('d', strtotime($date));

		// Asignar el mes al atributo day
		$this->day = $day;
	}

	public function getDayOfWeek()
	{
		// Obtener la fecha en formato 'YYYY-MM-DD' del atributo date_ipat
		$date = $this->date_ipat;

		// Extraer el día de la semana en formato numérico (0 para domingo, 1 para lunes, etc.)
		$dayOfWeek = date('w', strtotime($date));

		// Asignar el día de la semana al atributo dayOfWeek
		$this->dayOfWeek = $dayOfWeek;
	}
}
