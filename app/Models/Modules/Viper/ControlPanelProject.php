<?php

namespace App\Models\Modules\Viper;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ControlPanelProject extends Model
{
    use HasFactory;

    /**
     * Nombre de la tabla en la base de datos.
     *
     * @var string
     */
    protected $table = 'control_panel_project';

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
        'control_panel_id','project_id','description'
    ];


    public function controlPanel()
    {
        return $this->belongsTo(ControlPanel::class, 'control_panel_id');
    }

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }
}
