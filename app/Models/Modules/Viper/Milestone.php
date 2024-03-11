<?php

namespace App\Models\Modules\Viper;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Modelo Eloquent para la tabla 'milestones'.
 *
 * @property int $milestone_classes_id Identificador de la clase de hito asociada al hito.
 * @property int $milestone_subclasses_id Identificador de la subclase de hito asociada al hito.
 * @property string $date Fecha del hito.
 * @property string $project_id ID del proyecto asociado al hito.
 *
 * @package App\Models\Viper
 * @author Jhon Orjuela <jhonfanor.06.2000@gmail.com>
 * @copyright  2024 Ignicion S.A.S.
 * @version    v1.0.0
 */
class Milestone extends Model
{
    use HasFactory;

    /**
     * Nombre de la tabla en la base de datos.
     *
     * @var string
     */
    protected $table = 'milestones';

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
        'milestone_classes_id',
        'milestone_subclasses_id',
        'date',
        'project_id',
    ];

    /**
     * Obtiene la clase de hito asociada al hito.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function milestoneClass()
    {
        return $this->belongsTo(MilestoneClass::class, 'milestone_classes_id');
    }

    /**
     * Obtiene la subclase de hito asociada al hito.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function milestoneSubclass()
    {
        return $this->belongsTo(MilestoneSubclass::class, 'milestone_subclasses_id');
    }
}