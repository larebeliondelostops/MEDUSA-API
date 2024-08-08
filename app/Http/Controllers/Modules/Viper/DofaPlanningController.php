<?php

namespace App\Http\Controllers\Modules\Viper;

use App\Http\Controllers\Controller;
use App\Http\Request\Modules\Viper\DofaPlanningRequest;
use App\Interfaces\Modules\Viper\DofaPlanningInterface;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Http\Response;


class DofaPlanningController extends BaseController
{

    private DofaPlanningInterface $dofaPlanningInterface;


    public function __construct(DofaPlanningInterface $dofaPlanningInterface)
    {
        parent::__construct();

        $this->dofaPlanningInterface = $dofaPlanningInterface;
    }

    public function store(DofaPlanningRequest $request)
    {
        try {
            $dofaPlanningCreated = $this->dofaPlanningInterface->createNewDofaPlanning(collect($request->validated()));

            return response()->json([
                'message' => 'Dofa Planning created successfully.',
                'data'    => $dofaPlanningCreated,
            ], Response::HTTP_CREATED);
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }


    public function update(DofaPlanningRequest $request, int $id)
    {
        try {
            $dofaPlanningUpdate = $this->dofaPlanningInterface->updateDofaPlanning(collect($request->validated()), $id);
            
            return response()->json([
                'message' => 'Dofa Planning updated successfully.',
                'data' => $dofaPlanningUpdate,
            ], Response::HTTP_OK);
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }


    public function index()
    {
        try {
            $dofaPlannings = $this->dofaPlanningInterface->getAllDofaPlanning();
            return response()->json([
                "data" => $dofaPlannings
            ],Response::HTTP_OK);
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }


    public function show(int $id)
    {
        try {
            $dofaPlanning = $this->dofaPlanningInterface->getDofaPlanning($id);
            return response()->json([
                "data" => $dofaPlanning
            ], Response::HTTP_OK);
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }


    public function destroy(int $id)
    {
        try {
            $dofaPlanning = $this->dofaPlanningInterface->deleteDofaPlanning($id);
            return response()->json([
                'message' => 'Dofa Planning deleted successfully',
                "data" => $dofaPlanning
            ], Response::HTTP_OK);
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }
}
