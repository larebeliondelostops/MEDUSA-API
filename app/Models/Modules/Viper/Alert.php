<?php

namespace App\Models\Modules\Viper;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Modelo Eloquent para la tabla 'alerts'.
 *
 * @property string $id Identificador único de la alerta.
 * @property string $type Tipo de alerta.
 * @property string $state Estado de la alerta.
 * @property string $description Descripción de la alerta.
 * @property string $date Fecha de la alerta.
 * @property int $indicator_id Identificador del indicador asociado a la alerta.
 *
 * @package App\Models\Viper
 * @author Jhon Orjuela <jhonfanor.06.2000@gmail.com>
 * @copyright  2024 Ignicion S.A.S.
 * @version    v1.0.0
 */
class Alert extends Model
{
    use HasFactory;

    /**
     * Nombre de la tabla en la base de datos.
     *
     * @var string
     */
    protected $table = 'alerts';

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
        'updated_at', 
        'deleted_at'
    ];

    /**
     * Los atributos que son asignables en masa.
     *
     * @var array
     */
    protected $fillable = [
        'name','type', 'state', 'description', 'date', 'indicator_id', 'project_id'
    ];

    /**
     * Relación muchos a uno con la tabla 'indicators'.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function indicator()
    {
        return $this->belongsTo(Indicator::class, 'indicator_id');
    }

    /**
     * Obtiene el proyecto asociado a la alerta.
     */
    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }
}
