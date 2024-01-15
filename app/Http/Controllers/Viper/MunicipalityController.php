<?php

namespace App\Http\Controllers\Viper;

// Librerias del modulo viper
use App\DTOs\Viper\Municipality\MunicipalityDTO;
use App\Http\Request\Viper\MunicipalityRequest;
use App\Interfaces\Viper\MunicipalityInterface;

// Librerias de terceros
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MunicipalityController extends BaseController
{
    private MunicipalityInterface $municipalityInterface;

    public function __construct(MunicipalityInterface $municipalityInterface)
    {
        parent::__construct();
        $this->municipalityInterface = $municipalityInterface;
    }

    public function store(MunicipalityRequest $request)
    {
        try
        {
            $data = $request->validated();
            $municipalityDTO = new MunicipalityDTO($data);
            $newMunicipality = $this->municipalityInterface->createNewMunicipality($municipalityDTO);
            return response()->json([
                "message" => "Municipio creado satisfactoriamente.",
                "data" => $newMunicipality,
            ], Response::HTTP_CREATED);
        }
        catch (Exception $exception)
        {
            return $this->handleException($exception);
        }
    }

    public function index(Request $request)
    {
        try
        {
            $queryFilterParams = $request->query();
            $municipalitiesGotDTO = $this->municipalityInterface->getAllMunicipalities($queryFilterParams);
            return response()->json([
                "data" => $municipalitiesGotDTO,
            ], Response::HTTP_OK);
        }
        catch(Exception $exception)
        {
            return $this->handleException($exception);
        }
    }

    public function show(Request $request, int $id)
    {
        try
        {
            $municipalityGotDTO = $this->municipalityInterface->getMunicipalityById($id);
            return response()->json([
                "data" => $municipalityGotDTO,
            ], Response::HTTP_OK);
        }
        catch(Exception $exception)
        {
            return $this->handleException($exception);
        }
    }

    public function update(MunicipalityRequest $request, int $id)
    {
        try
        {
            $dataUpdate = $request->validated();
            $municipalityUpdate = new MunicipalityDTO($dataUpdate);
            $municipalityUpdated = $this->municipalityInterface->updateMunicipality($municipalityUpdate, $id);
            return response()->json([
                "message" => "Municipio actualizado satisfactoriamente.",
                "data" => $municipalityUpdated,
            ], Response::HTTP_OK);
        }
        catch(Exception $exception)
        {
            return $this->handleException($exception);
        }
    }

    public function destroy(Request $request, int $id)
    {
        try
        {
            $municipalityDeleted = $this->municipalityInterface->deleteMunicipality($id);
            return response()->json([
                "message" => "Municipio eliminado satisfactoriamente.",
                "data" => $municipalityDeleted,
                ], Response::HTTP_OK);
        }
        catch(Exception $exception)
        {
            return $this->handleException($exception);
        }
    }
}
