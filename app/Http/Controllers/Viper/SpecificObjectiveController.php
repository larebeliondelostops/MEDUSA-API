<?php

namespace App\Http\Controllers\Viper;

use App\Http\Controllers\Controller;
use App\Http\Requests\Viper\SpecificObjectiveRequest;
use App\Interfaces\Viper\SpecificObjectiveInterface;
use App\DTOs\Viper\SpecificObjectiveDTO;
use Illuminate\Http\Request;
use Exception;

class SpecificObjectiveController extends Controller
{
    private SpecificObjectiveInterface $specificObjectiveInterface;

    public function __construct(SpecificObjectiveInterface $specificObjectiveInterface)
    {
        $this->specificObjectiveInterface = $specificObjectiveInterface;
    }

    public function store(SpecificObjectiveRequest $request)
    {
        try {
            $validatedData = $request->validated();
            $specificObjectiveDTO = new SpecificObjectiveDTO($validatedData);

            $this->specificObjectiveInterface->createNewSpecificObjective($specificObjectiveDTO);

            return response()->json([
                'success' => true,
                'message' => 'Specific Objective created successfully.',
                'data' => $specificObjectiveDTO->toArray(),
            ], 201);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An internal server error occurred.',
            ], 500);
        }
    }

    public function update(SpecificObjectiveRequest $request, int $id)
    {
        try {
            $validatedData = $request->validated();
            $specificObjectiveDTO = new SpecificObjectiveDTO($validatedData);

            $this->specificObjectiveInterface->updateSpecificObjective($specificObjectiveDTO, $id);

            return response()->json([
                'success' => true,
                'message' => 'Specific Objective updated successfully.',
                'data' => $specificObjectiveDTO->toArray(),
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An internal server error occurred.',
            ], 500);
        }
    }

    public function index(Request $request, int $scopeId)
    {
        try {
            $specificObjectives = $this->specificObjectiveInterface->getAllSpecificObjectiveByScope($scopeId);
            return response()->json($specificObjectives, 200);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An internal server error occurred.',
            ], 500);
        }
    }

    public function show(Request $request, int $id)
    {
        try {
            $specificObjectiveDTO = $this->specificObjectiveInterface->getSpecificObjective($id);
            return response()->json($specificObjectiveDTO->toArray(), 200);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An internal server error occurred.',
            ], 500);
        }
    }

    public function destroy(Request $request, int $id)
    {
        try {
            $specificObjectiveDTO = $this->specificObjectiveInterface->deleteSpecificObjective($id);
            return response()->json($specificObjectiveDTO->toArray(), 200);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An internal server error occurred.',
            ], 500);
        }
    }
}
