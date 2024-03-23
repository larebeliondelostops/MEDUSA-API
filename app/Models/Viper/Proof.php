<?php

namespace App\Models\Viper;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Viper\Project;

/**
 * Modelo Eloquent para la tabla 'proofs'.
 *
 * @property int $id Identificador único de la prueba.
 * @property string $name Nombre de la prueba.
 * @property string $url URL de la prueba.
 * @property string $responsible Responsable de la prueba.
 * @property int $activity_id Identificador de la actividad asociada a la prueba.
 *
 * @package App\Models\Viper
 * @author Jhon Orjuela <jhonfanor.06.2000@gmail.com>
 * @copyright  2024 Ignicion S.A.S.
 * @version    v1.0.0
 */
class Proof extends Model
{
    use HasFactory;

    /**
     * Nombre de la tabla en la base de datos.
     *
     * @var string
     */
    protected $table = 'proofs';

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
        'url', 
        'responsible',
        'product_id',
    ];

    /**
     * Obtiene la Producto asociada a la prueba.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Obtiene el bpin del proyecto asociado al ID de prueba específico.
     *
     * @return string|null Bpin del proyecto o null si no se encuentra.
     */
    public function getProjectBpin()
    {
        return Project::whereHas('scope', function ($query) {
            $query->whereHas('specificObjectives.products', function ($query) {
                $query->where('id', $this->product->id);
            });
        })->value('bpin');
    }
}
