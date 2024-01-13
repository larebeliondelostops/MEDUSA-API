<?php

namespace App\Http\Controllers\Viper;

// Librerias del Modulo Viper
use App\DTOs\Viper\State\StateDTO;
use App\Http\Request\Viper\StateRequest;
use App\Interfaces\Viper\StateInterface;

// Librerias de terceros
use Exception;
use PDOException;
use Illuminate\Http\Request;

class StateController extends BaseController
{
    private StateInterface $stateInterface;

    public function __construct(StateInterface $stateInterface)
    {
        parent::__construct();
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
                'message' => 'State created successfully',
                'data' => $stateCreatedDTO
            ], 201);
        }
        catch (Exception $exception)
        {
            return $this->handleException($exception);
        }
    }
    public function update(StateRequest $request, int $id)
    {
        try
        {
            $data = $request->validated();
            $stateUpdatedDTO = new StateDTO($data);
            $stateUpdatedDTO2 = $this->stateInterface->updateState($id, $stateUpdatedDTO);

            return response()->json([
                'message' => 'State updated successfully.',
                'data'    => $stateUpdatedDTO2,

            ], 200);
        }
        catch (Exception $exception)
        {
            return $this->handleException($exception);
        }
    }

    public function show(Request $request, int $id)
    {
        try
        {
            $stateDTO = $this->stateInterface->getStateById($id);
            return response()->json([
                'message' => 'State got successfully',
                'data'=> $stateDTO,

            ]);
        }
        catch (Exception $exception)
        {
            return $this->handleException($exception);
        }
    }

    public function destroy(Request $request, int $id)
    {
        try
        {
            $stateDTO = $this->stateInterface->deleteState($id);
            return response()->json([
                'message' => 'State deleted successfully',
                'data'=> $stateDTO->toArray()
            ]);
        }
        catch (Exception $exception)
        {
            $this->handleException($exception);
        }
    }
}
