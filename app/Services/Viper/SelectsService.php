<?php

namespace App\Services\Viper;

use App\Interfaces\Viper\SelectsInterface;
use App\Interfaces\Viper\StateInterface;
use App\Interfaces\Viper\SubstateInterface;
use App\Interfaces\Viper\SectorInterface; 
use App\Interfaces\Viper\DepartmentInterface;
use Illuminate\Support\Collection;

/**
 * Servicio para obtener información sobre los estados con sus subestados, sectores y departamentos para la creación de un proyecto.
 *
 * @package    App\Service\Viper
 * @author     Daniel Alférez <dan.alferez1@gmail.com>
 * @copyright  2024 Ignicion S.A.S.
 * @version    v1.0.0
 */
class SelectsService implements SelectsInterface
{
    private StateInterface $stateInterface;
    private SubstateInterface $substateInterface;
    private SectorInterface $sectorInterface; 
    private DepartmentInterface $departmentInterface; 

    public function __construct(StateInterface $stateInterface, SubstateInterface $substateInterface, SectorInterface $sectorInterface, DepartmentInterface $departmentInterface) // Añade $departmentInterface aquí
    {
        $this->stateInterface = $stateInterface;
        $this->substateInterface = $substateInterface;
        $this->sectorInterface = $sectorInterface; 
        $this->departmentInterface = $departmentInterface;
    }

    /**
     * Obtiene todas los estados con sus subestados, sectores y departamentos correspondientes.
     *
     * @return array Arreglo que representa los estados, sectores y departamentos agrupados por clave.
     */
    public function getAllSelects()
    {
        // Obtener todos los estados
        $states = $this->stateInterface->getAllStates();

        // Inicializar un arreglo para almacenar los resultados
        $result = [];

        // Iterar sobre cada estado para obtener sus subestados
        foreach ($states as $state) {
            $state_id = $state->id;

            // Obtener los subestados para el estado actual
            $substates = $this->substateInterface->getAllSubstatesByState($state_id);

            // Agregar el estado con sus subestados al arreglo de resultados
            $result['states'][] = [
                'id' => $state->id,
                'name' => $state->name,
                'substates' => $substates,
            ];
        }

        // Obtener todos los sectores
        $sectors = $this->sectorInterface->getAllSectors();

        // Agregar los sectores al arreglo de resultados
        $result['sectors'] = $sectors;

        // Obtener todos los departamentos
        $departments = $this->departmentInterface->getAllDepartments();

        // Agregar los departamentos al arreglo de resultados
        $result['departments'] = $departments;

        return $result;
    }
}
