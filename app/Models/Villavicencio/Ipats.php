<?php

namespace App\Models\Villavicencio;

use App\Models\Indicator;
use App\Traits\Points\HasPoints;
use App\Traits\Heatmaps\HasHeatmap;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ipats extends Model
{
    use HasFactory, HasPoints, HasHeatmap;

    protected $table = 'ipats';

	protected $primaryKey = 'id';

	public $timestamps = true;

	protected $guarded = [];

	protected $hidden = [];

	private $slug = 'ipat';

	private $specialType = 8;

	private $cacheKeyMarker = 'ipats_marker';

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

	public function Indicator()
    {
        return $this->belongsTo(Indicator::class, 'indicator');
    }

	private function pointProperties()
    {
        return [
			'specialType' => $this->specialType,
			'filter' => [date('Y', strtotime($this->date_ipat))]
		];
    }

	public function ProbabilisticGridIpats()
    {
        return $this->belongsTo(ProbabilisticGridIpat::class, 'probabilistic_grid_id');
    }

	public function getCacheKeyMarker()
	{
		return $this->cacheKeyMarker;
	}
}
