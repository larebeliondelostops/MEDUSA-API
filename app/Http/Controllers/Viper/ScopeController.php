<?php

namespace App\Http\Controllers\Viper;

use App\Http\Controllers\Controller;
use App\Http\Requests\Viper\ScopeRequest;
use App\Interfaces\Viper\ScopeInterface;
use App\DTOs\Viper\ScopeDTO;
use Illuminate\Http\Request;
use Exception;

/**
 * Controlador para la gestión de Ámbitos (Scopes) en la aplicación Viper.
 *
 * @package App\Http\Controllers\Viper
 * @author Jhon Orjuela <jhonfanor.06.2000@gmail.com>
 * @copyright 2024 Ignicion S.A.S.
 * @version v1.0.0
 */
class ScopeController extends Controller
{
    /**
     * @var ScopeInterface
     */
    private ScopeInterface $scopeInterface;

    /**
     * Constructor del controlador.
     *
     * @param ScopeInterface $scopeInterface
     */
    public function __construct(ScopeInterface $scopeInterface)
    {
        $this->scopeInterface = $scopeInterface;
    }

    /**
     * Almacena un nuevo Ámbito en la base de datos.
     *
     * @param ScopeRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(ScopeRequest $request)
    {
        try {
            $validatedData = $request->validated();
            $scopeDTO = new ScopeDTO($validatedData);

            $this->scopeInterface->createNewScope($scopeDTO);

            return response()->json([
                'success' => true,
                'message' => 'Scope created successfully.',
                'data'    => $scopeDTO->toArray(),
            ], 201);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An internal server error occurred.',
            ], 500);
        }
    }

    /**
     * Actualiza un Ámbito existente en la base de datos.
     *
     * @param ScopeRequest $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
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

    /**
     * Obtiene todos los Ámbitos asociados a un proyecto específico.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
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

    /**
     * Obtiene un Ámbito específico por su identificador único.
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
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

    /**
     * Elimina un Ámbito existente en la base de datos.
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
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
