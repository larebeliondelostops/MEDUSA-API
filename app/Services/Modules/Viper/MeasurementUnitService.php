<?php

namespace App\Services\Modules\Viper;

use App\Interfaces\Modules\Viper\MeasurementUnitInterface;
use App\Models\Modules\Viper\MeasurementUnit;
use App\Utils\Filters\Modules\Viper\MeasurementUnitFilter;
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
     * @return Collection Collection de Collections que representan las unidades de medidas.
     */
    public function getAllMeasurementUnits(array $queryParam = []): Collection
    {
                // Instancia del filtro para transformar los parámetros de consulta
                $filter = new MeasurementUnitFilter();
                $queryItems = $filter->transform($queryParam);
        
                // Construir la consulta de unidades de medidas
                $measurementUnitQuery = MeasurementUnit::query();
                foreach($queryItems as $item)
                {
                    $measurementUnitQuery->orWhere(...$item);
                }
                
                return $measurementUnitQuery->get();
    }

    /**
     * Obtiene la unidad de medida existente.
     *
     * @param int $measurementUnitId Identificador único de la unidad de medida que se va a actualizar.
     * @return Collection Collection de Collections que representan las unidades de medidas.
     */
    public function getMeasurementUnit(int $measurementUnitId): Collection
    {
        $measurementUnit = MeasurementUnit::findOrFail($measurementUnitId);

        return collect($measurementUnit);
    }

    /**
     * Almacena una nueva unidad de medida en la base de datos.
     *
     * @param Collection $measurementUnit Collection que contiene los datos de la nueva unidad de medida.
     * @return Collection Collection MeasurementUnit que representa la unidad de medida recién creada.
     */
    public function storeMeasurementUnit(Collection $measurementUnit): Collection
    {
        $newMeasurementUnit = MeasurementUnit::create($measurementUnit->toArray());

        return collection($newMeasurementUnit);
    }

    /**
     * Actualiza los datos de una unidad de medida existente.
     *
     * @param int $measurementUnitId Identificador único de la unidad de medida que se va a actualizar.
     * @param Collection $measurementUnit Collection que contiene los nuevos datos de la unidad de medida.
     * @return Collection Collection que representa la unidad de medida actualizada.
     */
    public function updateMeasurementUnit(int $measurementUnitId, Collection $measurementUnit): Collection
    {
        $measurementUnitUpdate = MeasurementUnit::findOrFail($measurementUnitId);
        $measurementUnitUpdate->update($measurementUnit->toArray());
        return collect($measurementUnitUpdate); 
    }

    /**
     * Elimina una unidad de medida existente.
     *
     * @param int $measurementUnitId Identificador único de la unidad de medida que se va a eliminar.
     * @return Collection Collection que representa la unidad de medida eliminada.
     */
    public function deleteMeasurementUnit(int $measurementUnitId)
    {
        $measurementUnit = MeasurementUnit::findOrFail($measurementUnitId);
        $measurementUnit->delete();
    }

}
