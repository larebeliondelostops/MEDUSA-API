<?php

namespace App\Interfaces\Viper;

use App\DTOs\Viper\SectorDTO;

/**
 * Interfaz para el servicio de manejo de sectores.
 *
 * Define las operaciones necesarias para la gestión de sectores en el sistema.
 * Las operaciones incluyen la obtención de todos los sectores existentes.
 * 
 * @package App\Interfaces\Viper
 */
interface SectorInterface {
    
    /**
     * Obtiene todos los sectores existentes.
     *
     * @return array Un array de objetos SectorDTO representando todos los sectores.
     */
    public function getAllSectors(): array;
}
