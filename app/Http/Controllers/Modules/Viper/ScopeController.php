<?php

namespace App\Http\Controllers\Modules\Viper;

use App\Http\Controllers\Controller;
use App\Http\Request\Viper\ScopeRequest;
use App\Interfaces\Modules\Viper\ScopeInterface;
use App\DTOs\Viper\Scope\ScopeDTO;
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
class ScopeController extends BaseController
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

            $scopeCreatedDTO = $this->scopeInterface->createNewScope($scopeDTO);

            return response()->json([
                'success' => true,
                'message' => 'Scope created successfully.',
                'data'    => $scopeCreatedDTO,
            ], 201);
        } catch (Exception $exception) {
            return $this->handleException($exception);
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

            $scopeUpdateDTO = $this->scopeInterface->updateScope($scopeDTO, $id);
            
            $scopeDTO->id = $id;
            
            return response()->json([
                'success' => true,
                'message' => 'Scope updated successfully.',
                'data' => $scopeUpdateDTO,
            ], 200);
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }

    /**
     * Obtiene todos los Ámbitos asociados a un proyecto específico.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request,$projectId)
    {
        try {
            $scopes = $this->scopeInterface->getScopeByProject($projectId);
            return response()->json($scopes, 200);
        } catch (Exception $exception) {
            return $this->handleException($exception);
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
        } catch (Exception $exception) {
            return $this->handleException($exception);
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
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }
}
