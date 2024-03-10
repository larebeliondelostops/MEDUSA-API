<?php

namespace App\Services\Modules\Viper;
use App\DTOs\Viper\Department\DepartmentDetailDTO;
use App\DTOs\Viper\Department\DepartmentRequestDTO;
use App\DTOs\Viper\Location\LocationRequestDTO;
use App\DTOs\Viper\Municipality\MunicipalityDetailDTO;
use App\DTOs\Viper\Municipality\MunicipalityRequestDTO;
use App\Interfaces\Modules\Viper\CoordinatesInterface;
use App\Interfaces\Modules\Viper\LocationInterface;
use App\Interfaces\Modules\Viper\MunicipalityInterface;
use App\Models\Modules\Viper\Municipality;
use App\Utils\Viper\Filters\MunicipalityFilter;


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
 * @version    v1.0.2
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
     * @param MunicipalityRequestDTO $municipalityDTO DTO con la información del municipio a crear.
     * @return MunicipalityRequestDTO DTO del municipio recién creado.
     */
    public function createNewMunicipality(MunicipalityRequestDTO $municipalityDTO) : MunicipalityRequestDTO
    {
        $municipalityDTO->coordinate = $this->coordinatesInterface->createNewCoordinates($municipalityDTO->coordinate);
        $newMunicipality = new Municipality(
            $municipalityDTO->toArray() +
            ['coordinate_id' => $municipalityDTO->coordinate->id]
        );
        $newMunicipality->save();
        return new MunicipalityRequestDTO(
            $newMunicipality->toArray()
        );
    }

    /**
     * Obtiene todos los municipios disponibles, con posibilidad de aplicar filtros.
     *
     * @param array $queryFilterParams Parámetros opcionales para filtrar la consulta.
     * @return array Array de MunicipalityRequestDTO de todos los municipios.
     */
    public function getAllMunicipalities(array $queryFilterParams = []) : array
    {
        $filter = new MunicipalityFilter();
        $queryItems = $filter->transform($queryFilterParams);

        $municipalityQuery = Municipality::with('coordinate', 'department', 'department.coordinate');
        foreach($queryItems as $item) {
            if(count($item) === 3) {
                $municipalityQuery->orWhere($item[0], $item[1], $item[2]);
            }
        }

        $municipalitiesDTO = $municipalityQuery->get()->transform(
            fn (Municipality $municipality) => new MunicipalityRequestDTO($municipality->toArray())
        );
        return $municipalitiesDTO->toArray();
    }

    /**
     * Recupera un municipio por su ID y retorna sus detalles.
     *
     * @param int $id ID del municipio a recuperar.
     * @return MunicipalityRequestDTO DTO del municipio solicitado.
     */
    public function getMunicipalityById(int $id) : MunicipalityDetailDTO
    {
        $municipalityGot = Municipality::with('coordinate', 'department', 'department.coordinate')->findOrFail($id);
        $data = $municipalityGot->toArray();
        $municipalityDTO = new MunicipalityDetailDTO($data);
        return $municipalityDTO;
    }

    /**
     * Actualiza un municipio existente identificado por su ID.
     *
     * @param MunicipalityRequestDTO $municipalityDTO DTO con la nueva información del municipio.
     * @param int $id ID del municipio a actualizar.
     * @return MunicipalityRequestDTO DTO del municipio actualizado.
     */
    public function updateMunicipality(MunicipalityRequestDTO $municipalityDTO, int $id) : MunicipalityRequestDTO
    {
        $municipalityGot = Municipality::with('coordinate')->findOrFail($id);
        // se actualizan los datos de la coordenada del municipio
        $municipalityDTO->coordinate = $this->coordinatesInterface->updateCoordinatesById($municipalityDTO->coordinate, $municipalityGot->coordinate->id);
        // actualizamos los datos del departamento
        $municipalityGot->fill($municipalityDTO->toArray());
        $municipalityGot->save();
        unset($municipalityGot['coordinate']); // eliminamos los datos desactualizados
        $municipalityDTO->fill($municipalityGot->toArray());

        return $municipalityDTO;
    }

    /**
     * Elimina un municipio identificado por su ID y retorna los detalles del municipio eliminado.
     *
     * @param int $id ID del municipio a eliminar.
     * @return MunicipalityRequestDTO DTO del municipio eliminado.
     */
    public function deleteMunicipality($id) : MunicipalityDetailDTO
    {
        $municipalityGot = Municipality::with('coordinate', 'department', 'department.coordinate')->findOrFail($id);
        $municipalityDelete = new MunicipalityDetailDTO($municipalityGot->toArray());
        $municipalityGot->delete();
        return $municipalityDelete;
    }
}
