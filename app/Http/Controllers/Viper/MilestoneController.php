<?php

namespace App\Http\Controllers\Viper;

use App\Http\Controllers\Controller;
use App\Http\Request\Viper\MilestoneRequest;
use App\Interfaces\Viper\MilestoneInterface;
use App\DTOs\Viper\Milestone\MilestoneDTO;
use Exception;
use Illuminate\Http\Request;

class MilestoneController extends BaseController
{
    private MilestoneInterface $milestoneInterface;
    public function __construct(MilestoneInterface $milestoneInterface)
    {
        parent::__construct();
        $this->milestoneInterface = $milestoneInterface;
    }


    public function store(MilestoneRequest $request)
    {
        try {
            $validatedData = $request->validated();
            $milestoneDTO = new MilestoneDTO($validatedData);
            $milestoneCreatedDTO = $this->milestoneInterface->createNewMilestone($milestoneDTO);

            return response()->json([
                'message' => 'Milestone created successfully.',
                'data'    => $milestoneCreatedDTO
            ], 201);
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }

    public function update(MilestoneRequest $request, int $id)
    {
        try {
            $validatedData = $request->validated();
            $milestoneDTO = new MilestoneDTO($validatedData);
            $stateUpdatedDTO = $this->milestoneInterface->updateMilestone($milestoneDTO, $id);

            return response()->json([
                'message' => 'Milestone updated successfully.',
                'data'    => $stateUpdatedDTO,
            ], 200);
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }

    public function index(int $projectId)
    {
        try {
            $milestones = $this->milestoneInterface->getAllMilestonesByProject($projectId);
            return response()->json([
                'data' => $milestones,
            ], 200);
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }

    public function show(int $id)
    {
        try {
            $milestones = $this->milestoneInterface->getMilestone($id);
            return response()->json([
                'data' => $milestones,
            ], 200);
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }

    public function destroy(Request $request, int $id)
    {
        try {
            $milestoneDTO = $this->milestoneInterface->deleteMilestone($id);
            return response()->json([
                'message' => 'Milestone deleted successfully',
                'data'=> $milestoneDTO->toArray()
            ],200);
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }
}
