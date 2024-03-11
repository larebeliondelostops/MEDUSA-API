<?php

namespace App\Http\Controllers\Modules\Viper;

use App\Http\Controllers\Controller;
use App\Http\Request\Modules\Viper\ScopeRequest;
use App\Interfaces\Modules\Viper\ScopeInterface;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Http\Response;

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
        parent::__construct();

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
            $scopeCreated = $this->scopeInterface->createNewScope(collect($request->validated()));

            return response()->json([
                'message' => 'Scope created successfully.',
                'data'    => $scopeCreated,
            ], Response::HTTP_CREATED);
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
            $scopeUpdate = $this->scopeInterface->updateScope(collect($request->validated()), $id);
            
            return response()->json([
                'message' => 'Scope updated successfully.',
                'data' => $scopeUpdate,
            ], Response::HTTP_OK);
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
            return response()->json([
                "data" => $scopes
            ],Response::HTTP_OK);
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
            $scope = $this->scopeInterface->getScope($id);
            return response()->json([
                "data" => $scope
            ], Response::HTTP_OK);
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
            $scope = $this->scopeInterface->deleteScope($id);
            return response()->json([
                'message' => 'Scope deleted successfully',
                "data" => $scope
            ], Response::HTTP_OK);
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }
}
