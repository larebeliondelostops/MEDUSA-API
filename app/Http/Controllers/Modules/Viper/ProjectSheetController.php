<?php

namespace App\Http\Controllers\Modules\Viper;

use App\Http\Controllers\Controller;
use App\Http\Request\Modules\Viper\ProjectSheetRequest;
use App\Interfaces\Modules\Viper\ProjectSheetInterface;
use Exception;
use Illuminate\Http\Request;


class ProjectSheetController extends BaseController
{
    private ProjectSheetInterface $projectSheet;

    public function __construct(ProjectSheetInterface $projectSheetInterface)
    {
        parent::__construct();
        $this->projectSheetInterface = $projectSheetInterface;
    }

    public function store(ProjectSheetRequest $request)
    {
        try {
            $projectSheetCreated = $this->projectSheetInterface->createNewProjectSheet(collect($request->validated()));

            return response()->json([
                'message' => 'Project Sheet created successfully.',
                'data'    => $projectSheetCreated
            ], 201);
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }

    public function update(ProjectSheetRequest $request, int $id)
    {
        try {
            $projectSheetUpdated = $this->projectSheetInterface->updateProjectSheet(collect($request->validated()), $id);

            return response()->json([
                'message' => 'Project Sheet updated successfully.',
                'data'    => $projectSheetUpdated,
            ], 200);
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }

    public function index(int $phaseId)
    {
        try {
            $projectSheets = $this->projectSheetInterface->getProjectSheetByPhase($phaseId);
            return response()->json([
                'data' => $projectSheets,
            ], 200);
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }

    public function show(int $id)
    {
        try {
            $projectSheets = $this->projectSheetInterface->getProjectSheet($id);
            return response()->json([
                'data' => $projectSheets,
            ], 200);
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }

    public function destroy(int $id)
    {
        try {
            $projectSheet = $this->projectSheetInterface->deleteProjectSheet($id);
            return response()->json([
                'message' => 'Project Sheet deleted successfully',
                'data'=> $projectSheet
            ],200);
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }

}
