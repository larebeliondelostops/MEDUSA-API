<?php

namespace App\Services\Viper;

use App\Interfaces\Viper\MunicipalityInterface;
use App\Interfaces\Viper\SelectsInterface;
use App\Interfaces\Viper\StateInterface;
use App\Interfaces\Viper\SubstateInterface;
use App\Interfaces\Viper\SectorInterface;
use App\Interfaces\Viper\DepartmentInterface;

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
    private MunicipalityInterface $municipalityInterface;

    public function __construct(StateInterface $stateInterface, SubstateInterface $substateInterface, SectorInterface $sectorInterface, DepartmentInterface $departmentInterface, MunicipalityInterface $municipalityInterface) // Añade $departmentInterface aquí
    {
        $this->stateInterface = $stateInterface;
        $this->substateInterface = $substateInterface;
        $this->sectorInterface = $sectorInterface;
        $this->departmentInterface = $departmentInterface;
        $this->municipalityInterface = $municipalityInterface;
    }

    /**
     * Obtiene todas los estados con sus subestados, sectores y departamentos correspondientes.
     *
     * @return array Arreglo que representa los estados, sectores y departamentos agrupados por clave.
     */
    public function getAllSelects()
    {

        $result = [];
        $result['states'] = $this->stateInterface->getAllStatesDetail();
        $result["departments"] = $this->departmentInterface->getAllDepartmentsDetail();
        $result['sectors'] = $this->sectorInterface->getAllSectors();
        return $result;
    }
}
