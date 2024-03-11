<?php

namespace App\Http\Controllers\Modules\Viper;

use App\Http\Controllers\Controller;
use App\Http\Request\Modules\Viper\SpecificObjectiveRequest;
use App\Interfaces\Modules\Viper\SpecificObjectiveInterface;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Http\Response;

/**
 * Controlador para la gestión de Objetivos Específicos en la aplicación Viper.
 *
 * @package App\Http\Controllers\Viper
 * @author Jhon Orjuela <jhonfanor.06.2000@gmail.com>
 * @copyright 2024 Ignicion S.A.S.
 * @version v1.0.0
 */
class SpecificObjectiveController extends BaseController
{
    /**
     * @var SpecificObjectiveInterface
     */
    private SpecificObjectiveInterface $specificObjectiveInterface;

    /**
     * Constructor del controlador.
     *
     * @param SpecificObjectiveInterface $specificObjectiveInterface
     */
    public function __construct(SpecificObjectiveInterface $specificObjectiveInterface)
    {
        parent::__construct();

        $this->specificObjectiveInterface = $specificObjectiveInterface;
    }

    /**
     * Almacena un nuevo Objetivo Específico en la base de datos.
     *
     * @param SpecificObjectiveRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(SpecificObjectiveRequest $request)
    {
        try {
            $specificObjectiveCreate = $this->specificObjectiveInterface->createNewSpecificObjective(collect($request->validated()));

            return response()->json([
                'message' => 'Specific Objective created successfully.',
                'data' => $specificObjectiveCreate,
            ], Response::HTTP_CREATED);
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }

    /**
     * Actualiza un Objetivo Específico existente en la base de datos.
     *
     * @param SpecificObjectiveRequest $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(SpecificObjectiveRequest $request, int $id)
    {
        try {
            $specificObjectiveUpdate = $this->specificObjectiveInterface->updateSpecificObjective(collect( $request->validated()), $id);

            return response()->json([
                'message' => 'Specific Objective updated successfully.',
                'data' => $specificObjectiveUpdate,
            ], Response::HTTP_OK);
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }

    /**
     * Obtiene todos los Objetivos Específicos asociados a un alcance (scope) específico.
     *
     * @param Request $request
     * @param int $scopeId
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request, int $scopeId)
    {
        try {
            $specificObjectives = $this->specificObjectiveInterface->getAllSpecificObjectiveByScope($scopeId);
            return response()->json([
                "data" => $specificObjectives
            ], Response::HTTP_OK);
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }

    /**
     * Obtiene un Objetivo Específico específico por su identificador único.
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Request $request, int $id)
    {
        try {
            $specificObjective = $this->specificObjectiveInterface->getSpecificObjective($id);
            return response()->json([
                "data" => $specificObjective
            ], Response::HTTP_OK);
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }

    /**
     * Elimina un Objetivo Específico existente en la base de datos.
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Request $request, int $id)
    {
        try {
            $specificObjective = $this->specificObjectiveInterface->deleteSpecificObjective($id);
            return response()->json([
                'message' => 'Specific Objetive deleted successfully',
                "data" => $specificObjective
            ], 200);
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }
}
