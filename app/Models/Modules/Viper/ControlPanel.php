<?php

namespace App\Models\Modules\Viper;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ControlPanel extends Model
{
    use HasFactory;

    /**
     * Nombre de la tabla en la base de datos.
     *
     * @var string
     */
    protected $table = 'control_panel';

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
        'name','stage_control_id'
    ];


    public function stageControl()
    {
        return $this->belongsTo(StageControl::class, 'stage_control_id');
    }
}
