<?php

namespace App\Http\Controllers\Viper;

use App\Http\Controllers\Controller;
use App\Http\Requests\Viper\SpecificObjectiveRequest;
use App\Interfaces\Viper\SpecificObjectiveInterface;
use App\DTOs\Viper\SpecificObjectiveDTO;
use Illuminate\Http\Request;
use Exception;

/**
 * Controlador para la gestión de Objetivos Específicos en la aplicación Viper.
 *
 * @package App\Http\Controllers\Viper
 * @author Jhon Orjuela <jhonfanor.06.2000@gmail.com>
 * @copyright 2024 Ignicion S.A.S.
 * @version v1.0.0
 */
class SpecificObjectiveController extends Controller
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
            return response()->json($specificObjectives, 200);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An internal server error occurred.',
            ], 500);
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
            $specificObjectiveDTO = $this->specificObjectiveInterface->getSpecificObjective($id);
            return response()->json($specificObjectiveDTO->toArray(), 200);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An internal server error occurred.',
            ], 500);
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
