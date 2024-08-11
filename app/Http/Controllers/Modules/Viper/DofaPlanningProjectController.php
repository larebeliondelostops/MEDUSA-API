<?php

namespace App\Http\Controllers\Modules\Viper;

use App\Http\Controllers\Controller;
use App\Http\Request\Modules\Viper\DofaPlanningProjectRequest;
use App\Interfaces\Modules\Viper\DofaPlanningProjectInterface;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Http\Response;

class DofaPlanningProjectController extends BaseController
{

    private DofaPlanningProjectInterface $dofaPlanningProjectInterface;


    public function __construct(DofaPlanningProjectInterface $dofaPlanningProjectInterface)
    {
        parent::__construct();

        $this->dofaPlanningProjectInterface = $dofaPlanningProjectInterface;
    }

    public function store(DofaPlanningProjectRequest $request)
    {
        try {
            $dofaPlanningProjectCreated = $this->dofaPlanningProjectInterface->createNewDofaPlanningProject(collect($request->validated()));

            return response()->json([
                'message' => 'Dofa Planning Project created successfully.',
                'data'    => $dofaPlanningProjectCreated,
            ], Response::HTTP_CREATED);
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }

    public function update(DofaPlanningProjectRequest $request, int $id)
    {
        try {
            $dofaPlanningProjectUpdate = $this->dofaPlanningProjectInterface->updateDofaPlanningProject(collect($request->validated()), $id);
            
            return response()->json([
                'message' => 'Dofa Planning Project updated successfully.',
                'data' => $dofaPlanningProjectUpdate,
            ], Response::HTTP_OK);
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }

    public function index(String $projectId)
    {
        try {
            $dofaPlanningsProject = $this->dofaPlanningProjectInterface->getDofaPlanningProjectByProject($projectId);
            return response()->json([
                "data" => $dofaPlanningsProject
            ],Response::HTTP_OK);
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }

    public function show(int $id)
    {
        try {
            $dofaPlanningProject = $this->dofaPlanningProjectInterface->getDofaPlanningProject($id);
            return response()->json([
                "data" => $dofaPlanningProject
            ], Response::HTTP_OK);
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }

    public function destroy(int $id)
    {
        try {
            $dofaPlanningProject = $this->dofaPlanningProjectInterface->deleteDofaPlanningProject($id);
            return response()->json([
                'message' => 'Dofa Planning Project deleted successfully',
                "data" => $dofaPlanningProject
            ], Response::HTTP_OK);
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }
}
