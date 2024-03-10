<?php

namespace App\Interfaces\Modules\Viper;

/**
 * Interface Cronograma.
 *
 * Esta interface tiene como objeto declarar todas las funcionalidades necesarias
 * para manejar los cronogramas de los proyectos.
 *
 * @package    App\Service\Viper
 * @author     Jorge Abella <j0rg3.4b3ll4@gmail.com>
 * @copyright  2024 Ignicion S.A.S.
 * @version    v1.0.0
 */
interface ScheduleInterface
{
    /**
     * Metodo que retorna el EDT (Estructura de Desgloce de Trabajo) del proyecto en varios niveles:
     *  - Nivel 1: Bpin del proyecto
     *  - Nivel 2: Productos del proyecto
     *  - Nivel 3+: Entregables del proyecto
     *  - Nodos Hojas: Actividades del proyecto
     *
     * @param string BPIN del proyecto al que se le generara el Diagrama EDT
     * @return array Diagrama EDT del proyecto
     */
    public function generateProjectEDT(string $projectBpin) : array;
}
