<?php

namespace App\Interfaces\Viper;

use App\DTOs\Viper\Proof\ProofDTO;

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
     * @param ProofDTO $proofDTO Los datos de la prueba a crear.
     * @param \Illuminate\Http\UploadedFile $file El archivo de la prueba a subir.
     * @return ProofDTO La prueba creada.
     */
    public function createNewProof(ProofDTO $proofDTO, \Illuminate\Http\UploadedFile $file): ProofDTO;

    /**
     * Actualiza el nombre de una prueba existente.
     *
     * @param int $id El identificador de la prueba a actualizar.
     * @param string $newName El nuevo nombre para la prueba.
     * @return ProofDTO La prueba actualizada.
     */
    public function updateProof(int $id, string $newName): ProofDTO;
    
    /**
     * Obtiene todas las pruebas asociadas a un producto específico.
     *
     * @param int $productId El identificador del producto.
     * @return array Un arreglo de objetos ProofDTO representando las pruebas asociadas al producto.
     */
    public function getAllProofsByProduct(int $productId): array;

    /**
     * Obtiene todas las pruebas asociadas a un pryecto específico.
     *
     * @param int $proyectId El identificador del proyecto.
     * @return array Un arreglo de objetos ProofDTO representando las pruebas asociadas al proyecto.
     */
    public function getAllProofsByProyect(int $projectId): array;
    /**
     * Obtiene una prueba específica por su identificador.
     *
     * @param int $id El identificador único de la prueba.
     * @return ProofDTO La prueba encontrada.
     */
    public function getProof(int $id): ProofDTO;

    /**
     * Elimina una prueba específica por su identificador.
     *
     * @param int $id El identificador único de la prueba a eliminar.
     * @return ProofDTO La prueba eliminada.
     */
    public function deleteProof(int $id): ProofDTO;
}
