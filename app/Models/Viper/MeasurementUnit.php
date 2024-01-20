<?php

namespace App\Models\Viper;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Modelo Eloquent para la tabla 'MeasurementUnit' Unidades de Medida.
 *
 * @property int $id Identificador único de la unidad de medida (serial).
 * @property string $name Nombre de la unidad de medida.
 *
 * @package App\Models\Viper
 * @author    Daniel Alferez <dan.alferez1@gmail.com>
 * @copyright  2024 Ignicion S.A.S.
 * @version    v1.0.0
 */
class MeasurementUnit extends Model
{
    use HasFactory;

    /**
     * Nombre de la tabla en la base de datos.
     *
     * @var string
     */
    protected $table = 'measurement_units';

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
    ];

    /**
     * Relación uno a muchos con la tabla 'indicator'.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function indicators()
    {
        return $this->hasMany(Indicator::class);
    }

    
    /**
     * Relación uno a muchos con la tabla 'product'.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    // public function products()
    // {
    //     return $this->hasMany(Product::class);
    // }
}
