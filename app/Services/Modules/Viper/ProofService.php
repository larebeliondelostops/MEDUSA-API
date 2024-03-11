<?php

namespace App\Services\Modules\Viper;

use Illuminate\Support\Collection;
use App\Interfaces\Modules\Viper\ProofInterface;
use App\Models\Modules\Viper\Proof;
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
        $originalFilename = $file->getClientOriginalName();

        $newProof = new Proof($proof->toArray());

        $project_id = $newProof->getProjectBpin();

        $folderPath = "test/{$project_id}/report_{$newProof->report_id}";
    
        $filename = $this->getUniqueFilename($folderPath, $originalFilename);

        $filePath = Storage::disk('spaces')->putFileAs($folderPath, $file, $filename);

        $url = Storage::disk('spaces')->url($filePath);

        $newProof->name = $filename;
        $newProof->url = $url;

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

        $originalFilePath = parse_url($proof->url, PHP_URL_PATH);

        if (Storage::disk('spaces')->exists($originalFilePath)) {
            $extension = pathinfo($originalFilePath, PATHINFO_EXTENSION);

            $newFileName = $this->getUniqueFilename(dirname($originalFilePath), $newName) . '.' . $extension;

            $newFilePath = dirname($originalFilePath) . '/' . $newFileName;

            if (Storage::disk('spaces')->copy($originalFilePath, $newFilePath)) {
                Storage::disk('spaces')->delete($originalFilePath);

                $proof->name = $newFileName;
                $proof->url = Storage::disk('spaces')->url($newFilePath);
                $proof->save();

                return collect($proof);
            }
            throw new Exception('Error al copiar el archivo con el nuevo nombre');
        }
        throw new Exception('Prueba no encontrada en el sistema de archivos');
    }

    /**
     * Obtiene todas las pruebas asociadas a un producto específico.
     *
     * @param int $productId El identificador del producto.
     * @return Collection Collection de Collections representando las pruebas asociadas al producto.
     */
    public function getAllProofsByReport(int $reportId): Collection
    {
        $proofs = Proof::where('report_id', $reportId)->get();

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
        $proof = Proof::findOrFail($id);

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

        $filePath = parse_url($proof->url, PHP_URL_PATH);

        if (Storage::disk('spaces')->exists($filePath)) {
            Storage::disk('spaces')->delete($filePath);
        }
        $proof->delete();

        return collect($proof);
    }

    /**
     * Genera un nombre único para un archivo en una carpeta específica.
     *
     * @param string $folderPath La ruta de la carpeta donde se guarda el archivo.
     * @param string $originalFilename El nombre original del archivo.
     * @return string El nombre único generado.
     */
    private function getUniqueFilename($folderPath, $originalFilename)
    {
        $filename = $originalFilename;
        $counter = 1;

        while (Storage::disk('spaces')->exists("{$folderPath}/{$filename}")) {
            $filename = pathinfo($originalFilename, PATHINFO_FILENAME) . "({$counter})" . '.' . pathinfo($originalFilename, PATHINFO_EXTENSION);
            $counter++;
        }
        return $filename;
    }
}
