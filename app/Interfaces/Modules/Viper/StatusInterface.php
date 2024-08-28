<?php

namespace App\Interfaces\Modules\Viper;

use Illuminate\Support\Collection;

/**
 * Interfaz para el servicio de manejo de Estados del modulo Viper.
 *
 * Define las operaciones necesarias para la gestión de estados del modulo viper.
 * Las operaciones incluyen la obtencion de informacion de estados.
 *
 * @package    App\Interfaces\Viper
 * @author     Jorge Abella <j0rg3.4b3ll4@gmail.com>
 * @copyright  2024 Ignicion S.A.S.
 * @version    v1.0.0
 */
interface StatusInterface {
    /**
     * Obtiene el estado por su nombre.
     *
     * @param string $name Nombre del estado.
     * @return Collection Collection con la información del estado.
     */
    public function getStatusByName(string $name) : Collection;
}