<?php

namespace App\Http\Controllers\Modules\Viper;

use App\Http\Controllers\Controller;
use App\Http\Request\Modules\Viper\ControlPaneProjectRequest;
use App\Interfaces\Modules\Viper\ControlPanelProjectInterface;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Http\Response;

class ControlPanelProjectController extends BaseController
{

    private ControlPanelProjectInterface $controlPanelProjectInterface;

    public function __construct(ControlPanelProjectInterface $controlPanelProjectInterface)
    {
        parent::__construct();

        $this->controlPanelProjectInterface = $controlPanelProjectInterface;
    }

    public function store(ControlPanelRequest $request)
    {
        try {
            $controlPanelProjectCreated = $this->controlPanelProjectInterface->createNewControlPanel(collect($request->validated()));

            return response()->json([
                'message' => 'Control Panel Project created successfully.',
                'data'    => $controlPanelProjectCreated,
            ], Response::HTTP_CREATED);
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }

    public function update(ControlPanelRequest $request, int $id)
    {
        try {
            $controlPanelProjectUpdate = $this->controlPanelProjectInterface->updateControlPanelProject(collect($request->validated()), $id);
            
            return response()->json([
                'message' => 'Control Panel Project updated successfully.',
                'data' => $controlPanelProjectUpdate,
            ], Response::HTTP_OK);
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }

    public function index(String $projectId)
    {
        try {
            $controlPanelProject = $this->controlPanelProjectInterface->getAllControlPanelProjectByProject($projectId);
            return response()->json([
                "data" => $controlPanelProject
            ],Response::HTTP_OK);
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }

    public function display()
    {
        try {
            $controlPanelProject = $this->controlPanelProjectInterface->getAllControlPanelProjectByAllProject();
            return response()->json([
                "data" => $controlPanelProject
            ],Response::HTTP_OK);
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }

    public function show(int $id)
    {
        try {
            $controlPanelProject = $this->controlPanelProjectInterface->getControlPanelProject($id);
            return response()->json([
                "data" => $controlPanelProject
            ], Response::HTTP_OK);
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }

    public function destroy(int $id)
    {
        try {
            $controlPanelProject = $this->controlPanelProjectInterface->deleteControlPanel($id);
            return response()->json([
                'message' => 'Control Panel Project deleted successfully',
                "data" => $controlPanelProject
            ], Response::HTTP_OK);
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }
}
