<?php

namespace App\Models\Villavicencio;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HurtoVehiculo extends Model
{
    use HasFactory;

    /**
     * Nombre de la tabla a la que apunta el modelo.
     * @var string
     */
    protected $table = 'hurtos_vehiculos';

    /**
     * La llave primaria para el modelo.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Los campos que se permiten llenar.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Declarar la tabla sin timestamps.
     *
     * @var string
     */
    public $timestamps = false;

    static function getDirecciones()
    {
        $direcciones = HurtoVehiculo::pluck('direccion')->toArray();

        $direccionesConUbicacion = array_map(function ($direccion) {
            return $direccion . ' Villavicencio, Meta'; // Agregar la ubicación al final de cada dirección
        }, $direcciones);

        return $direccionesConUbicacion;
    }
}
