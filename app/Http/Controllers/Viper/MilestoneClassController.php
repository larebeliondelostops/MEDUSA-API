<?php

namespace App\Http\Controllers\Viper;

use App\Http\Controllers\Controller;
use App\Http\Request\Viper\MilestoneClassRequest;
use App\Interfaces\Viper\MilestoneClassInterface;
use App\DTOs\Viper\MilestoneClass\MilestoneClassDTO;
use Exception;
use Illuminate\Http\Request;

class MilestoneClassController extends BaseController
{
    private MilestoneClassInterface $milestoneClassInterface;
    public function __construct(MilestoneClassInterface $milestoneClassInterface)
    {
        parent::__construct();
        $this->milestoneClassInterface = $milestoneClassInterface;
    }


    public function store(MilestoneClassRequest $request)
    {
        try {
            $validatedData = $request->validated();
            $milestoneClassDTO = new MilestoneClassDTO($validatedData);
            $milestoneClassCreatedDTO = $this->milestoneClassInterface->createNewMilestoneClass($milestoneClassDTO);

            return response()->json([
                'message' => 'Milestone Class created successfully.',
                'data'    => $milestoneClassCreatedDTO
            ], 201);
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }

    public function update(MilestoneClassRequest $request, int $id)
    {
        try {
            $validatedData = $request->validated();
            $milestoneClassDTO = new MilestoneClassDTO($validatedData);
            $stateUpdatedDTO = $this->milestoneClassInterface->updateMilestoneClass($milestoneClassDTO, $id);

            return response()->json([
                'message' => 'Milestone Class updated successfully.',
                'data'    => $stateUpdatedDTO,
            ], 200);
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }

    public function index()
    {
        try {
            $milestoneClasses = $this->milestoneClassInterface->getAllMilestoneClasses();
            return response()->json([
                'data' => $milestoneClasses,
            ], 200);
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }

    public function show(int $id)
    {
        try {
            $milestoneClasses = $this->milestoneClassInterface->getMilestoneClass($id);
            return response()->json([
                'data' => $milestoneClasses,
            ], 200);
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }

    public function destroy(Request $request, int $id)
    {
        try {
            $milestoneClassDTO = $this->milestoneClassInterface->deleteMilestoneClass($id);
            return response()->json([
                'message' => 'Milestone Class deleted successfully',
                'data'=> $milestoneClassDTO->toArray()
            ],200);
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }
}
