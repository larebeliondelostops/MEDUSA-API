<?php

namespace App\Models\Modules\Viper;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    /**
     * Los atributos que se pueden asignar en masa.
     *
     * @var array
     */
    protected $fillable = [
        'description',
        'total_quantity',
        'optimistic_time',
        'most_likely_time',
        'pessimistic_time',
        'estimated_time',
        'total_value',
        'in_kind_contribution',
        'start_date',
        'end_date',
        'deliverable_id',
        'folder_id',
        'measurement_unit_id',
        'number'
    ];

    /**
     * Obtener el entregable al que pertenece la actividad.
     */
    public function deliverable()
    {
        return $this->belongsTo(Deliverable::class);
    }

    /**
     * Obtener la carpeta a la que pertenece la actividad.
     */
    public function folder()
    {
        return $this->belongsTo(Folder::class);
    }

    /**
     * Obtener la unidad de medida a la que pertenece la actividad.
     */
    public function measurementUnit()
    {
        return $this->belongsTo(MeasurementUnit::class);
    }

    /**
     * Obtener las precedencias donde esta actividad es la actividad de mayor precedencia.
     */
    public function higherPrecedences()
    {
        return $this->hasMany(Precedence::class, 'higher_id');
    }

    /**
     * Obtener las precedencias donde esta actividad es la actividad de menor precedencia.
     */
    public function lowerPrecedences()
    {
        return $this->hasMany(Precedence::class, 'lower_id');
    }
}
