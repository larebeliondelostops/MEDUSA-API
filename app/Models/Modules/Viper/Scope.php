<?php

namespace App\Models\Modules\Viper;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Modelo Eloquent para la tabla 'scopes'.
 *
 * @property int $id
 * @property string $description
 * @property string $project_id
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 *
 * @property \App\Models\Modules\Viper\Project $project
 * @property \Illuminate\Database\Eloquent\Collection|\App\Models\Modules\Viper\SpecificObjective[] $specificObjectives
 *
 * @package App\Models\Viper
 * @package App\DTOs\Viper
 * @author Jhon Orjuela <jhonfanor.06.2000@gmail.com>
 * @copyright 2024 Ignicion S.A.S.
 * @version v1.0.0
 */
class Scope extends Model
{
    use HasFactory;

    /**
     * Nombre de la tabla en la base de datos.
     *
     * @var string
     */
    protected $table = 'scopes';

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
        'description',
        'project_id',
    ];

    /**
     * Relación muchos a uno con la tabla 'projects'.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id', 'bpin');
    }

    /**
     * Relación uno a muchos con la tabla 'specific_objectives'.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function specificObjectives()
    {
        return $this->hasMany(SpecificObjective::class, 'scope_id', 'id');
    }
}
