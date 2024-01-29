<?php

namespace App\Http\Controllers\Viper;

use App\Http\Controllers\Controller;
use App\Http\Request\Viper\MilestoneSubclassRequest;
use App\Interfaces\Viper\MilestoneSubclassInterface;
use App\DTOs\Viper\MilestoneSubclass\MilestoneSubclassDTO;
use Exception;
use Illuminate\Http\Request;

class MilestoneSubclassController extends BaseController
{
    private MilestoneSubclassInterface $milestoneSubclassInterface;
    public function __construct(MilestoneSubclassInterface $milestoneSubclassInterface)
    {
        parent::__construct();
        $this->milestoneSubclassInterface = $milestoneSubclassInterface;
    }


    public function store(MilestoneSubclassRequest $request)
    {
        try {
            $validatedData = $request->validated();
            $milestoneSubclassDTO = new MilestoneSubclassDTO($validatedData);
            $milestoneSubclassCreatedDTO = $this->milestoneSubclassInterface->createNewMilestoneSubclass($milestoneSubclassDTO);

            return response()->json([
                'message' => 'Milestone Subclass created successfully.',
                'data'    => $milestoneSubclassCreatedDTO
            ], 201);
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }

    public function update(MilestoneSubclassRequest $request, int $id)
    {
        try {
            $validatedData = $request->validated();
            $milestoneSubclassDTO = new MilestoneSubclassDTO($validatedData);
            $stateUpdatedDTO = $this->milestoneSubclassInterface->updateMilestoneSubclass($milestoneSubclassDTO, $id);

            return response()->json([
                'message' => 'Milestone Subclass updated successfully.',
                'data'    => $stateUpdatedDTO,
            ], 200);
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }

    public function index(int $milestoneClassId)
    {
        try {
            $milestoneSubclasses = $this->milestoneSubclassInterface->getAllMilestoneSubclassesByMilestoneClass($milestoneClassId);
            return response()->json([
                'data' => $milestoneSubclasses,
            ], 200);
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }

    public function show(int $id)
    {
        try {
            $milestoneSubclasses = $this->milestoneSubclassInterface->getMilestoneSubclass($id);
            return response()->json([
                'data' => $milestoneSubclasses,
            ], 200);
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }

    public function destroy(Request $request, int $id)
    {
        try {
            $milestoneSubclassDTO = $this->milestoneSubclassInterface->deleteMilestoneSubclass($id);
            return response()->json([
                'message' => 'Milestone Subclass deleted successfully',
                'data'=> $milestoneSubclassDTO->toArray()
            ],200);
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }
}
