<?php

namespace App\Http\Controllers\Viper;

use App\Http\Controllers\Controller;
use App\Http\Request\Viper\ReportRequest;
use App\Interfaces\Viper\ReportInterface;
use App\DTOs\Viper\Report\ReportDTO;
use Illuminate\Http\Request;
use Exception;


/**
 * Controlador para la gestión de Ámbitos (Reports) en la aplicación Viper.
 *
 * @package App\Http\Controllers\Viper
 * @author Jhon Orjuela <jhonfanor.06.2000@gmail.com>
 * @copyright 2024 Ignicion S.A.S.
 * @version v1.0.0
 */
class ReportController extends BaseController
{

    private ReportInterface $reportInterface;

    public function __construct(ReportInterface $reportInterface)
    {
        parent::__construct();
        $this->reportInterface = $reportInterface;
    }

    /**
     * Almacena un nuevo informe.
     *
     * @param  ReportRequest  $request  La instancia del formulario de solicitud.
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(ReportRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $reportDTO = new ReportDTO($validatedData);

            $reportCreatedDTO = $this->reportInterface->createNewReport($reportDTO);

            return response()->json([
                'success' => true,
                'message' => 'Report created successfully.',
                'data'    => $reportCreatedDTO,
            ], 201);
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }

    /**
     * Actualiza un informe existente.
     *
     * @param  ReportRequest  $request  La instancia del formulario de solicitud.
     * @param  int  $id  El identificador del informe que se va a actualizar.
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(ReportRequest $request, int $id)
    {
        try {
            $validatedData = $request->validated();

            $reportDTO = new ReportDTO($validatedData);

            $reportUpdateDTO = $this->reportInterface->updateReport($reportDTO, $id);
            
            $reportDTO->id = $id;
            
            return response()->json([
                'success' => true,
                'message' => 'Report updated successfully.',
                'data' => $reportUpdateDTO,
            ], 200);
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }

    /**
     * Obtiene todos los informes asociados a un proyecto.
     *
     * @param  Request  $request  La instancia de la solicitud HTTP.
     * @param  int  $projectId  El identificador del proyecto.
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request, $projectId)
    {
        try {
            $reports = $this->reportInterface->getAllReportByProject($projectId);

            return response()->json([
                'data' => $reports,
            ], 200);
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }

    /**
     * Obtiene un informe específico por su ID.
     *
     * @param  Request  $request  La instancia de la solicitud HTTP.
     * @param  int  $id  El identificador del informe.
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Request $request, int $id)
    {
        try {
            $alert = $this->reportInterface->getReport($id);

            return response()->json([
                'data' => $alert,
            ], 200);
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }

    /**
     * Elimina un informe específico por su ID.
     *
     * @param  Request  $request  La instancia de la solicitud HTTP.
     * @param  int  $id  El identificador del informe que se va a eliminar.
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Request $request, int $id)
    {
        try {
            $reportDTO = $this->reportInterface->deleteReport($id);

            return response()->json([
                'message' => 'Report deleted successfully',
                'data'=> $reportDTO->toArray()
            ],200);
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }
}