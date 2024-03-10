<?php

namespace App\Http\Controllers\Viper;

use App\Http\Controllers\Controller;
use App\Http\Request\Viper\ReportRequest;
use App\Interfaces\Viper\ReportInterface;
use App\DTOs\Viper\Report\ReportDTO;
use Exception;
use Illuminate\Http\Request;

/**
 * Controlador para manejar las operaciones relacionadas con los Reportes en el sistema Viper.
 *
 * Este controlador proporciona métodos para almacenar, actualizar, recuperar y eliminar Reportes.
 *
 * @package App\Http\Controllers\Viper
 * @package App\Http\Controllers\Viper
 * @author Jhon Orjuela <jhonfanor.06.2000@gmail.com>
 * @copyright 2024 Ignicion S.A.S.
 * @version v1.0.0
 */
class ReportController extends BaseController
{

    /**
     * @var ReportInterface Instancia de la interfaz ProofInterface.
     */
    private ReportInterface $reportInterface;

    /**
     * Constructor del controlador ReportController.
     *
     * @param ReportInterface $reportInterface Instancia de ReportInterface para la inyección de dependencias.
     */
    public function __construct(ReportInterface $reportInterface)
    {
        parent::__construct();
        $this->reportInterface = $reportInterface;
    }

    /**
     * Almacena un nuevo reporte en el sistema.
     *
     * @param ReportRequest $request La solicitud HTTP que contiene los datos del reporte.
     * @return \Illuminate\Http\JsonResponse Respuesta JSON con el resultado de la operación.
     */
    public function store(ReportRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $reportDTO = new ReportDTO($validatedData);

            $reportCreatedDTO = $this->reportInterface->createNewReport($reportDTO);

            return response()->json([
                'message' => 'Report Class created successfully.',
                'data'    => $reportCreatedDTO
            ], 201);
        } catch (\Exception $exception) {
            return $this->handleException($exception);
        }
    }

    /**
     * Actualiza un reporte existente en el sistema.
     *
     * @param ReportRequest $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(ReportRequest $request, int $id)
    {
        try {
            $validatedData = $request->validated();
            $reportDTO = new ReportDTO($validatedData);
            $stateUpdatedDTO = $this->reportInterface->updateReport($reportDTO, $id);

            return response()->json([
                'message' => 'Report updated successfully.',
                'data'    => $stateUpdatedDTO,
            ], 200);
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }

    /**
     * Obtiene todas los reportes asociadas a un reporte específico.
     *
     * @param int $productId Identificador único del producto.
     * @return \Illuminate\Http\JsonResponse Respuesta JSON con el conjunto de reportes asociadas al reporte.
     */
    public function index(int $productId)
    {
        try {
            $reports = $this->reportInterface->getAllReportsByProduct($productId);
            return response()->json([
                'data' => $reports,
            ], 200);
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }

    /**
     * Obtiene todas los reportes asociadas a un reporte con sus pruebas.
     *
     * @param int $productId Identificador único del producto.
     * @return \Illuminate\Http\JsonResponse Respuesta JSON con el conjunto de reportes asociadas al reporte.
     */
    public function view(int $productId)
    {
        try {
            $reportDTO = $this->reportInterface->getAllReportsByProductWithProof($productId);
            return response()->json([
                'data' => $reportDTO,
            ], 200);
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }


    /**
     * Obtiene un reporte específica por su identificador.
     *
     * @param int $id Identificador único de la reporte.
     * @return \Illuminate\Http\JsonResponse Respuesta JSON con los detalles de la reporte.
     */
    public function show(int $id)
    {
        try {
            $reportDTO = $this->reportInterface->getReport($id);
            return response()->json([
                'data' => $reportDTO,
            ], 200);
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }

    /**
     * Elimina un reporte específica por su identificador.
     *
     * @param int $id Identificador único del reporte a eliminar.
     * @return \Illuminate\Http\JsonResponse Respuesta JSON con el resultado de la operación.
     */
    public function destroy($id)
    {
        try {
            $reportDTO = $this->reportInterface->deleteReport($id);
            return response()->json([
                'message' => 'Report deleted successfully',
                'data'=> $reportDTO->toArray()
            ],200);
        } catch (\Exception $exception) {
            return $this->handleException($exception);
        }
    }
}