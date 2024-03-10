<?php

namespace App\Models\Modules\Viper;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Modelo Eloquent para la tabla 'Reports'.
 *
 * @property int $id Identificador único del reporte (serial).
 * @property string $name Nombre del reporte.
 * @property string|null $description Descripción del reporte.
 * @property string|null $responsible Persona responsable del reporte.
 * @property string $date Fecha del reporte.
 * @property int $product_id ID del producto asociado al reporte.
 *
 * @package App\Models\Viper
 * @author Jhon Orjuela <jhonfanor.06.2000@gmail.com>
 * @copyright  2024 Ignicion S.A.S.
 * @version    v1.0.0
 */
class Report extends Model
{
    /**
     * El nombre de la tabla asociada con el modelo.
     *
     * @var string
     */
    protected $table = 'reports';

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
        'description',
        'responsible',
        'date',
        'product_id',
    ];

    /**
     * Obtener el producto asociado con el reporte.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Obtener las pruebas asociadas con el reporte.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function proofs(): HasMany
    {
        return $this->hasMany(Proof::class);
    }
}
