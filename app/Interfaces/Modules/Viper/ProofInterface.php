<?php

namespace App\Interfaces\Modules\Viper;

use Illuminate\Support\Collection;

/**
 * Interfaz para la manipulación de pruebas en el sistema Viper.
 *
 * Esta interfaz define los métodos necesarios para crear, actualizar,
 * recuperar y eliminar pruebas en el sistema.
 *
 * @package App\Interfaces\Viper
 * @author     Jhon Orjuela <jhonfanor.06.2000@gmail.com>
 * @copyright  2024 Ignicion S.A.S.
 * @version    v1.0.0
 */
interface ProofInterface {

    /**
     * Crea una nueva prueba.
     *
     * @param Collection $proof Collection que contiene la información de la prueba a crear.
     * @param \Illuminate\Http\UploadedFile $file El archivo de la prueba a subir.
     * @return Collection Collection de la prueba creada.
     */
    public function createNewProof(Collection $proof, \Illuminate\Http\UploadedFile $file): Collection;

    /**
     * Actualiza el nombre de una prueba existente.
     *
     * @param int $id El identificador de la prueba a actualizar.
     * @param string $newName El nuevo nombre para la prueba.
     * @return Collection Collection de la prueba actualizada.
     */
    public function updateProof(int $id, string $newName): Collection;
    
    /**
     * Obtiene todas las pruebas asociadas a un reporte específico.
     *
     * @param int $reportId El identificador del report.
     * @return Collection Collection de Collection que contiene las pruebas asociadas al reporte.
     */
    public function getAllProofsByReport(int $reportId): Collection;

    /**
     * Obtiene una prueba específica por su identificador.
     *
     * @param int $id El identificador único de la prueba.
     * @return Collection Collection de la prueba encontrada.
     */
    public function getProof(int $id): Collection;

    /**
     * Elimina una prueba específica por su identificador.
     *
     * @param int $id El identificador único de la prueba a eliminar.
     * @return Collection Collection de la prueba eliminada.
     */
    public function deleteProof(int $id): Collection;
}
