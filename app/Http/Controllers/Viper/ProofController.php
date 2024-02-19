<?php

namespace App\Http\Controllers\Viper;

use App\Http\Controllers\Controller;
use App\Http\Request\Viper\ProofRequest;
use App\Interfaces\Viper\ProofInterface;
use App\DTOs\Viper\Proof\ProofDTO;
use Exception;
use Illuminate\Http\Request;

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
            $validatedData = $request->validated();

            $proofDTO = new ProofDTO($validatedData);

            $uploadedFiles = $request->file('files');

            $proofDTOs = [];

            foreach ($uploadedFiles as $file) {
                $proofDTOs[] = $this->proofInterface->createNewProof($proofDTO, $file);
            }

            return response()->json([
                'message' => 'Proofs created successfully.',
                'data' => $proofDTOs
            ], 201);
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

            $stateUpdatedDTO = $this->proofInterface->updateProof($id, $newName);

            return response()->json([
                'message' => 'Proof name updated successfully.',
                'data'    => $stateUpdatedDTO,
            ], 200);
        } catch (\Exception $exception) {
            return $this->handleException($exception);
        }
    }

    /**
     * Obtiene todas las pruebas asociadas a un producto específico.
     *
     * @param int $productId Identificador único del producto.
     * @return \Illuminate\Http\JsonResponse Respuesta JSON con el conjunto de pruebas asociadas al producto.
     */
    public function index(int $productId)
    {
        try {
            $proofs = $this->proofInterface->getAllProofsByProduct($productId);
            return response()->json([
                'data' => $proofs,
            ], 200);
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }

    /**
     * Obtiene todas las pruebas asociadas a un project específico.
     *
     * @param int $productId Identificador único del project.
     * @return \Illuminate\Http\JsonResponse Respuesta JSON con el conjunto de pruebas asociadas al project.
     */
    public function view(int $projectId)
    {
        try {
            $proofs = $this->proofInterface->getAllProofsByProyect($projectId);
            return response()->json([
                'data' => $proofs,
            ], 200);
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
            $proofDTO = $this->proofInterface->getProof($id);
            return response()->json([
                'data' => $proofDTO,
            ], 200);
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
            $proofDTO = $this->proofInterface->deleteProof($id);
            return response()->json([
                'message' => 'Proof deleted successfully',
                'data'=> $proofDTO->toArray()
            ],200);
        } catch (\Exception $exception) {
            return $this->handleException($exception);
        }
    }
}
