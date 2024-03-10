<?php

namespace App\Http\Controllers\Modules\Viper;

use App\Http\Controllers\Controller;
use App\Http\Request\Viper\IndicatorRequest;
use App\Interfaces\Modules\Viper\IndicatorInterface;
use App\Interfaces\Modules\Viper\MeasurementUnitInterface;
use App\DTOs\Viper\Indicator\IndicatorDTO;
use Exception;
use Illuminate\Http\Request;

/**
 * Controlador para la entidad Indicador en el sistema Viper.
 *
 * @package App\Http\Controllers\Viper
 * @author Jhon Orjuela <jhonfanor.06.2000@gmail.com>
 * @copyright  2024 Ignicion S.A.S.
 * @version    v1.0.0
 */
class IndicatorController extends BaseController
{
    /**
     * @var IndicatorInterface
     */
    private IndicatorInterface $indicatorInterface;

    /**
     * @var MeasurementUnitInterface
     */
    private MeasurementUnitInterface $measurementUnitInterface;

    /**
     * Constructor del controlador.
     *
     * @param IndicatorInterface $indicatorInterface
     * @param MeasurementUnitInterface $measurementUnitInterface
     */

    public function __construct(IndicatorInterface $indicatorInterface, MeasurementUnitInterface $measurementUnitInterface)
    {
        parent::__construct();
        $this->indicatorInterface = $indicatorInterface;
        $this->measurementUnitInterface = $measurementUnitInterface;
    }

    /**
     * Almacena un nuevo indicador.
     *
     * @param IndicatorRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(IndicatorRequest $request)
    {
        try {
            $validatedData = $request->validated();
            $indicatorDTO = new IndicatorDTO($validatedData);
            $indicatorCreatedDTO = $this->indicatorInterface->createNewIndicator($indicatorDTO);

            return response()->json([
                'message' => 'Indicator created successfully.',
                'data'    => $indicatorCreatedDTO
            ], 201);
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }

    /**
     * Actualiza un indicador existente.
     *
     * @param IndicatorRequest $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(IndicatorRequest $request, int $id)
    {
        try {
            $validatedData = $request->validated();
            $indicatorDTO = new IndicatorDTO($validatedData);
            $stateUpdatedDTO = $this->indicatorInterface->updateIndicator($indicatorDTO, $id);

            return response()->json([
                'message' => 'Indicator updated successfully.',
                'data'    => $stateUpdatedDTO,
            ], 200);
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }

    /**
     * Obtiene todos los indicadores asociados a un producto.
     *
     * @param int $productId
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(int $productId)
    {
        try {
            $indicators = $this->indicatorInterface->getAllIndicatorsByProduct($productId);
            foreach ($indicators as &$indicator) {
                $measurementUnit = $this->measurementUnitInterface->getMeasurementUnit($indicator->measurement_unit_id);
    
                $indicator->measurement_unit = $measurementUnit->name;

                unset($indicator->measurement_unit_id);
            }
            return response()->json([
                'data' => $indicators,
            ], 200);
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }

    /**
     * Obtiene los detalles de un indicador específico.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(int $id)
    {
        try {
            $indicator = $this->indicatorInterface->getIndicator($id);

            $measurementUnit = $this->measurementUnitInterface->getMeasurementUnit($indicator->measurement_unit_id);

            $indicator->measurement_unit = $measurementUnit->name;

            unset($indicator->measurement_unit_id);

            return response()->json([
                'data' => $indicator,
            ], 200);
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }

    /**
     * Elimina un indicador.
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Request $request, int $id)
    {
        try {
            $indicatorDTO = $this->indicatorInterface->deleteIndicator($id);
            return response()->json([
                'message' => 'Indicator deleted successfully',
                'data'=> $indicatorDTO->toArray()
            ],200);
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }
}
