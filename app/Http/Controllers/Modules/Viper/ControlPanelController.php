<?php

namespace App\Http\Controllers\Modules\Viper;

use App\Http\Controllers\Controller;
use App\Http\Request\Modules\Viper\ControlPanelRequest;
use App\Interfaces\Modules\Viper\ControlPanelInterface;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Http\Response;

class ControlPanelController extends BaseController
{

    private ControlPanelInterface $controlPanelInterface;

    public function __construct(ControlPanelInterface $controlPanelInterface)
    {
        parent::__construct();

        $this->controlPanelInterface = $controlPanelInterface;
    }

    public function store(ControlPanelRequest $request)
    {
        try {
            $controlPanelCreated = $this->controlPanelInterface->createNewControlPanel(collect($request->validated()));

            return response()->json([
                'message' => 'Control Panel created successfully.',
                'data'    => $controlPanelCreated,
            ], Response::HTTP_CREATED);
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }

    public function update(ControlPanelRequest $request, int $id)
    {
        try {
            $controlPanelUpdate = $this->controlPanelInterface->updateControlPanel(collect($request->validated()), $id);
            
            return response()->json([
                'message' => 'Control Panel updated successfully.',
                'data' => $controlPanelUpdate,
            ], Response::HTTP_OK);
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }

    public function index(int $stageControlId)
    {
        try {
            $controlPanel = $this->controlPanelInterface->getControlPanelByStageControl($stageControlId);
            return response()->json([
                "data" => $controlPanel
            ],Response::HTTP_OK);
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }

    public function display()
    {
        try {
            $controlPanel = $this->controlPanelInterface->getAllControlPanelByStageControl();
            return response()->json([
                "data" => $controlPanel
            ],Response::HTTP_OK);
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }

    public function show(int $id)
    {
        try {
            $controlPanel = $this->controlPanelInterface->getControlPanel($id);
            return response()->json([
                "data" => $controlPanel
            ], Response::HTTP_OK);
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }

    public function destroy(int $id)
    {
        try {
            $controlPanel = $this->controlPanelInterface->deleteControlPanel($id);
            return response()->json([
                'message' => 'Control Panel deleted successfully',
                "data" => $controlPanel
            ], Response::HTTP_OK);
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }
}
