<?php

namespace App\Models\Modules\Viper;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Modelo Eloquent para la tabla 'messages_bot'.
 *
 * @property string $id Identificador único del bot de mensajes.
 * @property string $response La respuesta del bot de mensajes.
 * @property string $file Los archios del bot de mensajes.
 * @property int $project_user_role_id Identificador del indicador asociado al bot de mensajes.
 *
 * @package App\Models\Viper
 * @author Jhon Orjuela <jhonfanor.06.2000@gmail.com>
 * @copyright  2024 Ignicion S.A.S.
 * @version    v1.0.0
 */
class MessageBot extends Model
{
    use HasFactory;

    /**
     * Nombre de la tabla en la base de datos.
     *
     * @var string
     */
    protected $table = 'messages_bot';

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
        'query','response', 'files', 'project_user_role_id'
    ];

    /**
     * Relación muchos a uno con la tabla 'project_user_role'.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function projectUserRole()
    {
        return $this->belongsTo(ProjectUserRole::class, 'project_user_role_id');
    }
}
