<?php

namespace App\Models\Viper;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Modelo Eloquent para la tabla 'milestone_classes'.
 *
 * @property int $id Identificador único de la clase de hito.
 * @property string $name Nombre de la clase de hito.
 *
 * @package App\Models\Viper
 * @author Jhon Orjuela <jhonfanor.06.2000@gmail.com>
 * @copyright  2024 Ignicion S.A.S.
 * @version    v1.0.0
 */
class MilestoneClass extends Model
{
    use HasFactory;

    protected $table = 'milestone_classes';

    protected $fillable = [
        'name',
    ];
}