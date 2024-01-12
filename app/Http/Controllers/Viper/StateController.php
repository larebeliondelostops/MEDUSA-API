<?php

namespace App\Http\Controllers\Viper;
use App\DTOs\Viper\State\StateDTO;
use App\Http\Controllers\Controller;
use App\Http\Request\Viper\StateRequest;
use App\Interfaces\Viper\StateInterface;
use Exception;
use Illuminate\Http\Request;

class StateController extends Controller
{
    private StateInterface $stateInterface;

    public function __construct(StateInterface $stateInterface)
    {
        $this->stateInterface = $stateInterface;
    }


    public function store(StateRequest $request)
    {
        try
        {
            $data = $request->validated();
            $newStateDTO = new StateDTO($data);
            $stateCreatedDTO = $this->stateInterface->createNewState($newStateDTO);
            return response()->json([
                'success'=> true,
                'message' => 'State created successfully',
                'data' => $stateCreatedDTO
            ]);
        }
        catch (Exception $e)
        {
            return response()->json([
                'success' => false,
                'message' => 'An internal server error occurred.'.$e->getMessage(),
            ], 500);
        }
    }
    public function update(StateRequest $request, int $id)
    {
        $data = $request->validated();
        $stateUpdatedDTO = new StateDTO($data);
        $stateUpdatedDTO = $this->stateInterface->updateState($id, $stateUpdatedDTO);

        return response()->json([
            'success' => true,
            'message' => 'State updated successfully.',
            'data'    => $stateUpdatedDTO->toArray(),
        ], 200);
    }
    public function show(Request $request, int $id)
    {
        try
        {
            $stateDTO = $this->stateInterface->getStateById($id);
            return response()->json([
                'success' => true,
                'message' => '',
                'data'=> $stateDTO->toArray()
            ]);
        }
        catch(Exception $e)
        {
            return response()->json([
                'success' => false,
                'message' => 'An internal server error occurred.',
            ], 500);
        }
    }
}
