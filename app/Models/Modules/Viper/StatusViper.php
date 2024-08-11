<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * La clase StatusViper esta pensada para gurdar una lista de todos los estados
 * que pueda tomar cualquier componente del modulo viper junto con su descripción.
 * 
 * Por el momento solo almacena estados de las actividades.
 */
class StatusViper extends Model
{
    use HasFactory;

    protected $hidden = ['created_at', 'updated_at'];

    protected $fillable = [
        'name',
        'description'
    ];
}
