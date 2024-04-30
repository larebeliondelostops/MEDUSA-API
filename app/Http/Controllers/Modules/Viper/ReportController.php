<?php

namespace App\Http\Controllers\Modules\Viper;

use App\Http\Controllers\Controller;
use App\Http\Request\Modules\Viper\ReportRequest;
use App\Interfaces\Modules\Viper\ReportInterface;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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
            $reportCreated = $this->reportInterface->createNewReport(collect($request->validated()));

            return response()->json([
                'message' => 'Report Class created successfully.',
                'data'    => $reportCreated
            ], Response::HTTP_CREATED);
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
            $stateUpdated = $this->reportInterface->updateReport(collect($request->validated()), $id);

            return response()->json([
                'message' => 'Report updated successfully.',
                'data'    => $stateUpdated,
            ], Response::HTTP_OK);
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }

    /**
     * Obtiene el reporte asociado a un entregable específico.
     *
     * @param int $deliverableId Identificador único del entregable.
     * @return \Illuminate\Http\JsonResponse Respuesta JSON del reporte asociado al entregable.
     */
    public function index(int $activityId)
    {
        try {
            $reports = $this->reportInterface->getReportByActivity($activityId);
            return response()->json([
                'data' => $reports,
            ], Response::HTTP_OK);
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }

    /**
     * Obtiene el reporte asociado a un entregalbe con sus pruebas.
     *
     * @param int $deliverableId Identificador único del entregable.
     * @return \Illuminate\Http\JsonResponse Respuesta JSON con el reporte asociadas al entregable.
     */
    public function view(int $activityId)
    {
        try {
            $report = $this->reportInterface->getReportByActivityWithProof($activityId);
            return response()->json([
                'data' => $report,
            ], Response::HTTP_OK);
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
            $report = $this->reportInterface->getReport($id);
            return response()->json([
                'data' => $report,
            ], Response::HTTP_OK);
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
            $report = $this->reportInterface->deleteReport($id);
            return response()->json([
                'message' => 'Report deleted successfully',
                'data'=> $report->toArray()
            ], Response::HTTP_OK);
        } catch (\Exception $exception) {
            return $this->handleException($exception);
        }
    }
}