<?php

namespace App\Models\Modules\Viper;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DofaPlanningProject extends Model
{
    use HasFactory;

    /**
     * Nombre de la tabla en la base de datos.
     *
     * @var string
     */
    protected $table = 'dofa_planning_project';

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
        'created_at'
    ];

    /**
     * Los atributos que son asignables en masa.
     *
     * @var array
     */
    protected $fillable = [
        'description','date','responsible','verification','dofa_planning_id','project_id'
    ];

    public function dofaPlanning()
    {
        return $this->belongsTo(DofaPlanning::class, 'dofa_planning_id');
    }

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id', 'bpin');
    }
}
