<?php

namespace App\Models\Viper;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Modelo Eloquent para la tabla 'Products'.
 *
 * @property int $id Identificador único del producto (serial).
 * @property string $name Nombre del producto.
 *
 * @package App\Models\Viper
 * @author    Daniel Alferez <dan.alferez1@gmail.com>
 * @copyright  2024 Ignicion S.A.S.
 * @version    v1.0.0
 */
class Product extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * Nombre de la tabla en la base de datos.
     *
     * @var string
     */
    protected $table = 'products';

    /**
     * Clave primaria de la tabla.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Los atributos que son asignables en masa.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'number',
        'amount',
        'specific_objective_id',
        'folder_id',
        'measurement_unit_id'
    ];
    protected $dates = ['deleted_at'];

    /**
     * Relación uno a muchos con la tabla 'measurement_units'.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function measurementUnit()
    {
        return $this->belongsTo(MeasurementUnit::class,"measurement_unit_id");
    }

    /**
     * Relación uno a muchos con la tabla 'specific_objective_id'.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function specificObjective()
    {
        return $this->belongsTo(SpecificObjective::class, "specific_objective_id");
    }

    /**
     * Relación uno a muchos con la tabla 'folder_id'.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function folder()
    {
        return $this->belongsTo(Folder::class, "folder_id");
    }


    /**
     * Relación uno a muchos con la tabla 'indicators-viper'.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function indicators()
    {
        return $this->hasMany(Indicator::class, 'product_id');
    }

}
