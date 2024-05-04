<?php

namespace App\Models\Modules\Viper;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Modules\Viper\Project;

/**
 * Modelo Eloquent para la tabla 'proofs'.
 *
 * @property int $id Identificador único de la prueba.
 * @property string $name Nombre de la prueba.
 * @property string $url URL de la prueba.
 * @property string $responsible Responsable de la prueba.
 * @property int $report_id Identificador del producto asociada a la prueba.
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
        'name', 
        'url', 
        'responsible',
        'report_id',
    ];

    /**
     * Obtiene el Reporte asociada a la prueba.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function report()
    {
        return $this->belongsTo(Report::class);
    }

    /**
     * Obtiene el bpin del proyecto asociado al ID de prueba específico.
     *
     * @return string|null Bpin del proyecto o null si no se encuentra.
     */
    public function getProjectBpin()
    {
        return Project::whereHas('scope', function ($query) {
            $query->whereHas('specificObjectives', function ($query) {
                $query->whereHas('products.deliverables.activities.report',function($query)
                {
                    $query->where('id', $this->report_id);
                });          
            });
        })->value('bpin');
    }
}
