<?php

namespace App\Services\Viper;

use App\DTOs\Viper\MeasurementUnit\MeasurementUnitDTO;
use App\Interfaces\Viper\MeasurementUnitInterface;
use App\Models\Viper\MeasurementUnit;
use Illuminate\Support\Collection;

/**
 * Servicio para manejar operaciones relacionadas con las etaptas de los proyectos.
 *
 * Este servicio implementa la interfaz MeasurementUnitInterface y es responsable
 * de realizar operaciones como la creación, actualización, recuperación
 * y eliminación de las unidades de medidas en los proyectos.
 * @package    App\Service\Viper
 * @author     Daniel Alférez <dan.alferez1@gmail.com>
 * @copyright  2024 Ignicion S.A.S.
 * @version    v1.0.0
 */
class MeasurementUnitService implements MeasurementUnitInterface
{
    /**
     * Obtiene todas las unidades de medidas existentes.
     *
     * @return Collection|MeasurementUnitDTO[] Colección de objetos MeasurementUnitDTO que representan las unidades de medidas.
     */
    public function getAllMeasurementUnits()
    {
        $measurementUnits = MeasurementUnit::all();
        $measurementUnitDTOs = $measurementUnits->transform(function ($measurementUnit) {
            return new MeasurementUnitDTO($measurementUnit->toArray());
        });

        return $measurementUnitDTOs;
    }

    /**
     * Obtiene la unidad de medida existente.
     *
     * @return Collection|MeasurementUnitDTO[] Colección de objetos MeasurementUnitDTO que representan las unidades de medidas.
     */
    public function getMeasurementUnit($measurementUnitId)
    {
        $measurementUnit = MeasurementUnit::findOrFail($measurementUnitId);
        $measurementUnitDTO =new MeasurementUnitDTO($measurementUnit->toArray());

        return $measurementUnitDTO;
    }

    /**
     * Almacena una nueva unidad de medida en la base de datos.
     *
     * @param MeasurementUnitDTO $measurementUnitDTO Objeto MeasurementUnitDTO que contiene los datos de la nueva unidad de medida.
     * @return MeasurementUnitDTO Objeto MeasurementUnitDTO que representa la unidad de medida recién creada.
     */
    public function storeMeasurementUnit(MeasurementUnitDTO $measurementUnitDTO)
    {
        // Crea una nueva instancia del modelo MeasurementUnit y guarda los datos
        $newMeasurementUnit = MeasurementUnit::create([
            'name' => $measurementUnitDTO->name,
        ]);

        return new MeasurementUnitDTO($newMeasurementUnit->toArray());
    }

    /**
     * Actualiza los datos de una unidad de medida existente.
     *
     * @param int $measurementUnitId ID de la unidad de medida que se va a actualizar.
     * @param MeasurementUnitDTO $measurementUnitDTO Objeto MeasurementUnitDTO que contiene los nuevos datos de la unidad de medida.
     * @return MeasurementUnitDTO Objeto MeasurementUnitDTO que representa la unidad de medida actualizada.
     * @throws \Exception Se arroja si la unidad de medida no se encuentra.
     */
    public function updateMeasurementUnit($measurementUnitId, MeasurementUnitDTO $measurementUnitDTO)
    {
        // Encuentra la unidad de medida por su ID
        $measurementUnit = MeasurementUnit::findOrFail($measurementUnitId);
        // Actualiza los datos de la unidad de medida
        $measurementUnit->update([
            'name' => $measurementUnitDTO->name,
        ]);
        return new MeasurementUnitDTO($measurementUnit->toArray()); 

    }

    /**
     * Elimina una unidad de medida existente.
     *
     * @param int $measurementUnitId ID de la unidad de medida que se va a eliminar.
     * @throws \Exception Se arroja si la unidad de medida no se encuentra.
     */
    public function deleteMeasurementUnit($measurementUnitId)
    {
        // Encuentra la unidad de medida por su ID y elimínala
        $measurementUnit = MeasurementUnit::findOrFail($measurementUnitId);
        $measurementUnit->delete();
    }

}
