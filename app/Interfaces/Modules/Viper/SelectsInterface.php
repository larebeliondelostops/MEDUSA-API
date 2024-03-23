<?php

namespace App\Interfaces\Modules\Viper;
use Illuminate\Support\Collection;

/**
 * Interface SelectsInterface
 *
 * Esta interfaz define el metodo para obtener información sobre los selects para la creación de un proyecto
 * 
 * @package    App\Service\Viper
 * @author     Daniel Alférez <dan.alferez1@gmail.com>
 * @copyright  2024 Ignicion S.A.S.
 * @version    v1.0.0
 */

interface SelectsInterface {
    
    /**
     * Obtener datos disponibles en los diferentes selects para la creación de un proyecto.
     *
     */
    public function getAllSelects() : Collection;


}
