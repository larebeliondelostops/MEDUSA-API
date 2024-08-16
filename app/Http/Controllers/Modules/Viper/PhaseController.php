<?php

namespace App\Http\Controllers\Modules\Viper;

use App\Http\Controllers\Controller;
use App\Http\Request\Modules\Viper\PhaseRequest;
use App\Interfaces\Modules\Viper\PhaseInterface;
use Exception;
use Illuminate\Http\Request;


class PhaseController extends BaseController
{
    private PhaseInterface $phaseInterface;

    public function __construct(PhaseInterface $phaseInterface)
    {
        parent::__construct();
        $this->phaseInterface = $phaseInterface;
    }

    public function store(PhaseRequest $request)
    {
        try {
            $phaseCreated = $this->phaseInterface->createNewPhase(collect($request->validated()));

            return response()->json([
                'message' => 'Phase created successfully.',
                'data'    => $phaseCreated
            ], 201);
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }

    public function update(PhaseRequest $request, int $id)
    {
        try {
            $phaseUpdated = $this->phaseInterface->updatePhase(collect($request->validated()), $id);

            return response()->json([
                'message' => 'Phase updated successfully.',
                'data'    => $phaseUpdated,
            ], 200);
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }

    public function index()
    {
        try {
            $phases = $this->phaseInterface->getAllPhases();
            return response()->json([
                'data' => $phases,
            ], 200);
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }

    public function show(int $id)
    {
        try {
            $phases = $this->phaseInterface->getPhase($id);
            return response()->json([
                'data' => $phases,
            ], 200);
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }

    public function destroy(int $id)
    {
        try {
            $phase = $this->phaseInterface->deletePhase($id);
            return response()->json([
                'message' => 'Phase deleted successfully',
                'data'=> $phase
            ],200);
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }

}
