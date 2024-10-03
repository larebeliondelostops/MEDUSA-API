<?php

namespace App\Services\Modules\Viper;

use Illuminate\Support\Collection;
use App\Interfaces\Modules\Viper\ProofInterface;
use App\Interfaces\Modules\Viper\DocumentInterface;
use App\Models\Modules\Viper\Proof;
use App\Models\Modules\Viper\Document;
use Exception;
use Storage;

/**
 * Servicio para la manipulación de pruebas en el sistema Viper.
 *
 * Este servicio proporciona métodos para crear, actualizar, recuperar y eliminar pruebas.
 *
 * @package App\Services\Modules\Viper
 * @author     Jhon Orjuela <jhonfanor.06.2000@gmail.com>
 * @copyright  2024 Ignicion S.A.S.
 * @version    v1.0.0 
 */
class ProofService implements ProofInterface
{
    private DocumentInterface $documentInterface;


    public function __construct(DocumentInterface $documentInterface)
    {
        $this->documentInterface = $documentInterface;
    }

    /**
     * Crea una nueva prueba.
     *
     * @param Collection $proof Los datos de la prueba a crear.
     * @param \Illuminate\Http\UploadedFile $file El archivo de la prueba a subir.
     * @return Collection Datos de la prueba creada.
     * @throws Exception Si hay un error durante el proceso.
     */
    public function createNewProof(Collection $proof, \Illuminate\Http\UploadedFile $file): Collection
    {
        $newProof = new Proof($proof->toArray());

        $collect = collect([
            'project_id' => $newProof->getProjectBpin(),
            'folder_id' => $newProof->getFolderId(),
        ]);
        $document = $this->documentInterface->createNewDocument($collect,$file);
        $newProof->document_id = $document['id'];
        $newProof->save();

        return collect($newProof);
    }

    /**
     * Actualiza el nombre de una prueba existente.
     *
     * @param int $id El identificador de la prueba a actualizar.
     * @param string $newName El nuevo nombre para la prueba.
     * @return Collection La prueba actualizada.
     * @throws Exception Si hay un error durante el proceso.
     */
    public function updateProof(int $id, string $newName): Collection
    {
        $proof = Proof::findOrFail($id);

        $this->documentInterface->updateDocument($proof->document_id,$newName);

        return Proof::findOrFail($id);
    }

    /**
     * Obtiene todas las pruebas asociadas a un producto específico.
     *
     * @param int $productId El identificador del producto.
     * @return Collection Collection de Collections representando las pruebas asociadas al producto.
     */
    public function getAllProofsByProgress(int $progressId): Collection
    {
        $proofs = Proof::where('progress_id', $progressId)->with('document')->get();

        $proofGot = $proofs->map(function ($proof) {
            return collect($proof);
        })->all();

        return collect($proofGot);
    }

    /**
     * Obtiene una prueba específica por su identificador.
     *
     * @param int $id El identificador único de la prueba.
     * @return Collection La prueba encontrada.
     * @throws Exception Si la prueba no existe.
     */
    public function getProof(int $id): Collection
    {
        $proof = Proof::with('document')->findOrFail($id);

        return collect($proof);
    }

    /**
     * Elimina una prueba específica por su identificador.
     *
     * @param int $proofId El identificador único de la prueba a eliminar.
     * @return Collection La prueba eliminada.
     * @throws Exception Si la prueba no existe o hay un error durante el proceso.
     */
    public function deleteProof(int $proofId): Collection
    {
        $proof = Proof::findOrFail($proofId);

        $this->documentInterface->deleteForceDocument($proof->document_id);

        $proof->delete();

        return collect($proof);
    }
}
