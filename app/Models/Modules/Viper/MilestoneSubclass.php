<?php

namespace App\Models\Modules\Viper;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Modelo Eloquent para la tabla 'milestone_subclasses'.
 *
 * @property int $id Identificador único de la subclase de hito.
 * @property string $name Nombre de la subclase de hito.
 * @property int $milestone_classes_id Identificador de la clase de hito asociada a la subclase de hito.
 *
 * @package App\Models\Viper
 * @author Jhon Orjuela <jhonfanor.06.2000@gmail.com>
 * @copyright  2024 Ignicion S.A.S.
 * @version    v1.0.0
 */
class MilestoneSubclass extends Model
{
    use HasFactory;

    /**
     * Nombre de la tabla en la base de datos.
     *
     * @var string
     */
    protected $table = 'milestone_subclasses';

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
        'milestone_class_id',
    ];

    /**
     * Obtiene la clase de hito asociada a la subclase de hito.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function milestoneClass()
    {
        return $this->belongsTo(MilestoneClass::class, 'milestone_classes_id');
    }
}
