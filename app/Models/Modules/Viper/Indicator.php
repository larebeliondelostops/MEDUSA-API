<?php

namespace App\Models\Modules\Viper;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Modelo Eloquent para la tabla 'indicators'.
 *
 * @property int $id Identificador único del indicador.
 * @property string $name Nombre del indicador.
 * @property int $start_year_of_goal Año de inicio de la meta del indicador.
 * @property int $end_year_goal Año de finalización de la meta del indicador.
 * @property string $unit Unidad de medida del indicador.
 * @property int $target_value Valor objetivo del indicador.
 * @property int $progress Progreso actual del indicador.
 * @property float $percentage_completed Porcentaje completado del indicador.
 * @property bool $is_main Indica si el indicador es principal.
 * @property int $product_id Identificador del producto asociado al indicador.
 *
 * @property \App\Models\Product $product Relación muchos a uno con la tabla 'products'.
 * @property \Illuminate\Database\Eloquent\Collection|\App\Models\Alert[] $alerts Relación uno a muchos con la tabla 'alerts'.
 *
 * @package App\Models
 * @version    1.0.0
 */
class Indicator extends Model
{
    use HasFactory;

    /**
     * Nombre de la tabla en la base de datos.
     *
     * @var string
     */
    protected $table = 'indicators_viper';

    /**
     * Clave primaria de la tabla.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Los atributos que son ocultado en masa.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 
        'updated_at', 
        'deleted_at'
    ];

    /**
     * Los atributos que son asignables en masa.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'start_year_of_goal', 'end_year_goal', 'target_value', 'progress', 'percentage_completed', 'is_main', 'product_id', 'measurement_unit_id'
    ];

    /**
     * Relación muchos a uno con la tabla 'products'.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    /**
     * Relación uno a muchos con la tabla 'alerts'.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function alerts()
    {
        return $this->hasMany(Alert::class, 'indicator_id');
    }
    /**
     * Relación muchos a uno con la tabla 'measurement_units'.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function measurementUnit()
    {
        return $this->belongsTo(MeasurementUnit::class, 'measurement_unit_id');
    }
}
