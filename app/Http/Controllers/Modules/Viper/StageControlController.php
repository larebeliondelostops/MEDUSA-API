<?php

namespace App\Http\Controllers\Modules\Viper;

use App\Http\Controllers\Controller;
use App\Http\Request\Modules\Viper\StageControlRequest;
use App\Interfaces\Modules\Viper\StageControlInterface;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Http\Response;

class StageControlController extends BaseController
{

    private StageControlInterface $stageControlInterface;

    public function __construct(StageControlInterface $stageControlInterface)
    {
        parent::__construct();

        $this->stageControlInterface = $stageControlInterface;
    }

    public function store(StageControlRequest $request)
    {
        try {
            $stageControlCreated = $this->stageControlInterface->createNewStageControl(collect($request->validated()));

            return response()->json([
                'message' => 'Stage Control created successfully.',
                'data'    => $stageControlCreated,
            ], Response::HTTP_CREATED);
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }

    public function update(StageControlRequest $request, int $id)
    {
        try {
            $stageControlUpdate = $this->stageControlInterface->updateStageControl(collect($request->validated()), $id);
            
            return response()->json([
                'message' => 'Stage Control updated successfully.',
                'data' => $stageControlUpdate,
            ], Response::HTTP_OK);
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }

    public function index()
    {
        try {
            $stageControl = $this->stageControlInterface->getAllStageControl();
            return response()->json([
                "data" => $stageControl
            ],Response::HTTP_OK);
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }

    public function show(int $id)
    {
        try {
            $stageControl = $this->stageControlInterface->getStageControl($id);
            return response()->json([
                "data" => $stageControl
            ], Response::HTTP_OK);
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }

    public function destroy(int $id)
    {
        try {
            $stageControl = $this->stageControlInterface->deleteStageControl($id);
            return response()->json([
                'message' => 'Stage Control deleted successfully',
                "data" => $stageControl
            ], Response::HTTP_OK);
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }
}
