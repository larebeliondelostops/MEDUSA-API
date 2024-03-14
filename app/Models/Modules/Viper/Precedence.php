<?php

namespace App\Models\Modules\Viper;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Precedence extends Model
{
    use HasFactory;

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
     * Los atributos que se pueden asignar en masa.
     *
     * @var array
     */
    protected $fillable = [
        'type',
        'delay_time',
        'higher_id',
        'lower_id',
    ];

    /**
     * Obtener la actividad de mayor precedencia para esta precedencia.
     */
    public function higher()
    {
        return $this->belongsTo(Activity::class, 'higher_id');
    }

    /**
     * Obtener la actividad de menor precedencia para esta precedencia.
     */
    public function lower()
    {
        return $this->belongsTo(Activity::class, 'lower_id');
    }
}
