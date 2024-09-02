<?php

namespace App\Http\Controllers\Modules\Viper;

use App\Http\Controllers\Controller;
use App\Http\Request\Modules\Viper\ProgressRequest;
use App\Interfaces\Modules\Viper\ProgressInterface;

use Illuminate\Http\Request;

class ProgressController extends BaseController
{
    private ProgressInterface $progressInterface;

    public function __construct(ProgressInterface $progressInterface)
    {
        $this->progressInterface = $progressInterface;
    }

    public function store(ProgressRequest $request)
    {
        try {
            $progressCreated = $this->progressInterface->createNewProgress(collect($request->validated()));

            return response()->json([
                'message' => 'Progress created successfully.',
                'data'    => $progressCreated
            ], 201);
        } catch (\Exception $exception) {
            return $this->handleException($exception);
        }
    }

    public function update(ProgressRequest $request, int $id)
    {
        try {
            $progressUpdated = $this->progressInterface->updateProgress(collect($request->validated()), $id);

            return response()->json([
                'message' => 'Progress updated successfully.',
                'data'    => $progressUpdated,
            ], 200);
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }

    public function index(int $activityId)
    {
        try {
            $progresses = $this->progressInterface->getAllProgressesByActivity($activityId);

            return response()->json([
                'data' => $progresses,
            ], 200);
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }

    public function show(int $id)
    {
        try {
            $progress = $this->progressInterface->getProgress($id);
            return response()->json([
                'data' => $progress,
            ], 200);
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }

    public function display(int $projectId)
    {
        try {
            $progresses = $this->progressInterface->getStatisticsProgress($projectId);

            return response()->json([
                'data' => $progresses,
            ], 200);
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }

    public function destroy(int $id)
    {
        try {
            $progress = $this->progressInterface->deleteProgress($id);
            return response()->json([
                'message' => 'Progress deleted successfully',
                'data'=> $progress
            ],200);
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }
}
