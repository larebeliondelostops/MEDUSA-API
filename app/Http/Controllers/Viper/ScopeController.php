<?php

namespace App\Http\Controllers\Viper;

use App\Http\Controllers\Controller;

use App\Http\Requests\Viper\ScopeRequest;
use App\Interfaces\Viper\ScopeInterface;
use App\DTOs\Viper\ScopeDTO;

use Illuminate\Http\Request;
use Exception;

class ScopeController extends Controller
{
    private ScopeInterface $scopeInterface;

    public function __construct(ScopeInterface $scopeInterface)
    {
        $this->scopeInterface = $scopeInterface;
    }

    public function store(ScopeRequest $request)
    {
        try {
            $validatedData = $request->validated();
            $scope = new Scope($validatedData);
            $scope->save();

            return response()->json([
                'success' => true,
                'message' => 'Scope created successfully.',
                'data'    => $scope->toArray(),
            ], 201);
        } catch (QueryException $e) {
            if ($e->getCode() === '23505') {
                return response()->json([
                    'success' => false,
                    'message' => 'Scope with the same project_id already exists.',
                ], 409);
            }

            throw new HttpException(500, 'Internal Server Error', $e);
        }
    }


    public function update(ScopeRequest $request, int $id)
    {
        try {
            $validatedData = $request->validated();
            $scopeDTO = new ScopeDTO($validatedData);

            $this->scopeInterface->updateScope($scopeDTO, $id);

            return response()->json([
                'success' => true,
                'message' => 'Scope updated successfully.',
                'data' => $scopeDTO->toArray(),
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An internal server error occurred.',
            ], 500);
        }
    }

    public function index(Request $request)
    {
        try {
            $projectId = $request->input('project_id', null);
            $scopes = $this->scopeInterface->getScopeByProject($projectId);
            return response()->json($scopes, 200);
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
            $scopeDTO = $this->scopeInterface->getScope($id);
            return response()->json($scopeDTO->toArray(), 200);
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
            $scopeDTO = $this->scopeInterface->deleteScope($id);
            return response()->json($scopeDTO->toArray(), 200);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An internal server error occurred.',
            ], 500);
        }
    }
}
