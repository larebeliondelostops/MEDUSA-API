<?php

namespace App\Services\Modules\Viper;
use App\Interfaces\Modules\Viper\CoordinatesInterface;
use App\Interfaces\Modules\Viper\MunicipalityInterface;
use App\Models\Modules\Viper\Municipality;
use App\Utils\Filters\Modules\Viper\MunicipalityFilter;
use Illuminate\Support\Collection;


/**
 * Servicio para la gestión de municipios en el módulo VIPER.
 *
 * Este servicio implementa la interfaz MunicipalityInterface, proporcionando la lógica de negocio
 * para la gestión de municipios. Incluye operaciones para la creación, actualización, eliminación,
 * y recuperación de municipios y sus detalles.
 *
 * @package    App\Services\Modules\Viper
 * @copyright  2024 Ignicion S.A.S.
 * @author     Jorge Abella <j0rg3.4b3ll4@gmail.com>
 * @version    v2.0.0
 */
class MunicipalityService implements MunicipalityInterface
{
    private CoordinatesInterface $coordinatesInterface;

    public function __construct(CoordinatesInterface $coordinatesInterface)
    {
        $this->coordinatesInterface = $coordinatesInterface;
    }

    /**
     * Crea un nuevo municipio y lo guarda en la base de datos.
     *
     * @param Collection $municipalityData Data con la información del municipio a crear.
     * @return Collection Data del municipio recién creado.
     */
    public function createNewMunicipality(Collection $municipalityData) : Collection
    {
        $municipalityData['coordinate'] = $this->coordinatesInterface->createNewCoordinates(collect($municipalityData['coordinate']));
        $newMunicipality = new Municipality(
            $municipalityData->toArray() +
            ['coordinate_id' => $municipalityData['coordinate']['id']]
        );
        $newMunicipality->save();
        return collect($newMunicipality);
    }

    /**
     * Obtiene todos los municipios disponibles, con posibilidad de aplicar filtros.
     *
     * @param array $queryFilterParams Parámetros opcionales para filtrar la consulta.
     * @return array Array de MunicipalityRequestData de todos los municipios.
     */
    public function getAllMunicipalities(array $queryFilterParams = []) : Collection
    {
        $filter = new MunicipalityFilter();
        $queryItems = $filter->transform($queryFilterParams);

        $municipalityQuery = Municipality::with('coordinate', 'department', 'department.coordinate');
        foreach($queryItems as $item) {
            if(count($item) === 3) {
                $municipalityQuery->orWhere($item[0], $item[1], $item[2]);
            }
        }

        $municipalitiesData = $municipalityQuery->get();
        return $municipalitiesData;
    }

    /**
     * Recupera un municipio por su ID y retorna sus detalles.
     *
     * @param int $id ID del municipio a recuperar.
     * @return Collection Data del municipio solicitado.
     */
    public function getMunicipalityById(int $id) : Collection
    {
        $municipalityGot = Municipality::with('coordinate', 'department', 'department.coordinate')->findOrFail($id);
        return collect($municipalityGot);
    }

    /**
     * Actualiza un municipio existente identificado por su ID.
     *
     * @param Collection $municipalityData Data con la nueva información del municipio.
     * @param int $id ID del municipio a actualizar.
     * @return Collection Data del municipio actualizado.
     */
    public function updateMunicipality(Collection $municipalityData, int $id) : Collection
    {
        $municipalityGot = Municipality::with('coordinate')->findOrFail($id);
        // se actualizan los datos de la coordenada del municipio
        $municipalityData['coordinate'] = $this->coordinatesInterface->updateCoordinatesById(collect($municipalityData['coordinate']), $municipalityGot->coordinate->id);
        // actualizamos los datos del departamento
        $municipalityGot->fill($municipalityData->toArray());
        $municipalityGot->save();

        return collect($municipalityGot);
    }

    /**
     * Elimina un municipio identificado por su ID y retorna los detalles del municipio eliminado.
     *
     * @param int $id ID del municipio a eliminar.
     * @return Collection Data del municipio eliminado.
     */
    public function deleteMunicipality($id) : Collection
    {
        $municipalityGot = Municipality::with('coordinate', 'department', 'department.coordinate')->findOrFail($id);
        $municipalityGot->delete();
        return collect($municipalityGot);
    }
}
