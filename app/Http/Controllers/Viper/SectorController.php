<?php

namespace App\Http\Controllers\Viper;

use App\Http\Controllers\Controller;

use App\Http\Request\Viper\SectorRequest;
use App\Interfaces\Viper\SectorInterface;
use App\DTOs\Viper\Sector\SectorDTO;

use Exception;
use PDOException;
use Illuminate\Http\Request;
class SectorController extends BaseController
{
    private SectorInterface $sectorInterface;

    public function __construct(SectorInterface $sectorInterface)
    {
        parent::__construct();
        $this->sectorInterface = $sectorInterface;
    }

    public function store(SectorRequest $request)
    {
        try {
            $validatedData = $request->validated();
            $sectorDTO = new SectorDTO($validatedData);
            $sectorCreatedDTO = $this->sectorInterface->createNewSector($sectorDTO);
            return response()->json([
                'message' => 'Sector created successfully.',
                'data'    => $sectorCreatedDTO
            ], 201);
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }

    public function update(SectorRequest $request, int $id)
    {
        try {
            $validatedData = $request->validated();
            $sectorDTO = new SectorDTO($validatedData);
            $stateUpdatedDTO = $this->sectorInterface->updateSector($sectorDTO, $id);

            return response()->json([
                'message' => 'Sector updated successfully.',
                'data'    => $stateUpdatedDTO,
            ], 200);
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }

    public function index(Request $request)
    {
        try {
            $sectors = $this->sectorInterface->getAllSectors();
            return response()->json([
                'data' => $sectors,
            ], 200);
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }

    public function destroy(Request $request, int $id)
    {
        try {
            $sectorDTO = $this->sectorInterface->deleteSector($id);
            return response()->json($sectorDTO->toArray(), 200);
        } catch (Exception $e) {
            $this->handleException($exception);
        }
    }
}
