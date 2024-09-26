<?php

namespace App\Http\Controllers\Modules\Viper;

use App\Http\Controllers\Controller;
use App\Http\Request\Modules\Viper\ProofRequest;
use App\Interfaces\Modules\Viper\ProofInterface;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/**
 * Controlador para manejar las operaciones relacionadas con las pruebas en el sistema Viper.
 *
 * Este controlador proporciona métodos para almacenar, actualizar, recuperar y eliminar pruebas.
 *
 * @package App\Http\Controllers\Viper
 */
class ProofController extends BaseController
{

    /**
     * @var ProofInterface Instancia de la interfaz ProofInterface.
     */
    private ProofInterface $proofInterface;

    /**
     * Constructor del controlador ProofController.
     *
     * @param ProofInterface $proofInterface Instancia de ProofInterface para la inyección de dependencias.
     */
    public function __construct(ProofInterface $proofInterface)
    {
        parent::__construct();
        $this->proofInterface = $proofInterface;
    }

    /**
     * Almacena una nueva prueba en el sistema.
     *
     * @param ProofRequest $request La solicitud HTTP que contiene los datos de la prueba.
     * @return \Illuminate\Http\JsonResponse Respuesta JSON con el resultado de la operación.
     */
    public function store(ProofRequest $request)
    {
        try {
            $uploadedFiles = $request->file('files');

            $proofs = [];

            foreach ($uploadedFiles as $file) {
                $proofs[] = $this->proofInterface->createNewProof(collect($request->validated()), $file);
            }

            return response()->json([
                'message' => 'Proofs created successfully.',
                'data' => $proofs
            ], Response::HTTP_CREATED);
        } catch (\Exception $exception) {
            return $this->handleException($exception);
        }
    }

    /**
     * Actualiza el nombre de una prueba existente.
     *
     * @param Request $request Solicitud HTTP que contiene el nuevo nombre para la prueba.
     * @param int $id Identificador único de la prueba a actualizar.
     * @return \Illuminate\Http\JsonResponse Respuesta JSON con el resultado de la operación.
     */
    public function update(Request $request, int $id)
    {
        try {
            $request->validate([
                'new_name' => 'required|string',
            ]);

            $newName = $request->input('new_name');

            $stateUpdated = $this->proofInterface->updateProof($id, $newName);

            return response()->json([
                'message' => 'Proof name updated successfully.',
                'data'    => $stateUpdated,
            ], Response::HTTP_OK);
        } catch (\Exception $exception) {
            return $this->handleException($exception);
        }
    }

    /**
     * Obtiene todas las pruebas asociadas a un progreso específico.
     *
     * @param int $REPORTId Identificador único del reporte.
     * @return \Illuminate\Http\JsonResponse Respuesta JSON con el conjunto de pruebas asociadas al reporte.
     */
    public function index(int $progressId)
    {
        try {
            $proofs = $this->proofInterface->getAllProofsByProgress($progressId);
            return response()->json([
                'data' => $proofs,
            ], Response::HTTP_OK);
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }

    /**
     * Obtiene una prueba específica por su identificador.
     *
     * @param int $id Identificador único de la prueba.
     * @return \Illuminate\Http\JsonResponse Respuesta JSON con los detalles de la prueba.
     */
    public function show(int $id)
    {
        try {
            $proof = $this->proofInterface->getProof($id);
            return response()->json([
                'data' => $proof,
            ], Response::HTTP_OK);
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }

    /**
     * Elimina una prueba específica por su identificador.
     *
     * @param int $id Identificador único de la prueba a eliminar.
     * @return \Illuminate\Http\JsonResponse Respuesta JSON con el resultado de la operación.
     */
    public function destroy($id)
    {
        try {
            $proof = $this->proofInterface->deleteProof($id);
            return response()->json([
                'message' => 'Proof deleted successfully',
                'data'=> $proof->toArray()
            ],Response::HTTP_OK);
        } catch (\Exception $exception) {
            return $this->handleException($exception);
        }
    }
}
