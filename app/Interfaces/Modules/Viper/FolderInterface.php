<?php

namespace App\Interfaces\Modules\Viper;

use Illuminate\Support\Collection;

/**
 * Interface FolderInterface
 *
 * Esta interfaz define los métodos que deben ser implementados por cualquier clase que actúe como servicio
 * para la manipulación de carpetas en el sistema Viper.
 * @package    App\Service\Viper
 * @author     Daniel Alférez <dan.alferez1@gmail.com>
 * @copyright  2024 Ignicion S.A.S.
 * @version    v1.0.0
 */

interface FolderInterface {
    
    /**
     * Crea una nueva carpeta en el sistema Viper.
     *
     * @param Collection $folderData Datos de la carpeta a crear.
     * @param int $higherFolderId Identificador de la carpeta padre (si tiene)
     */
    public function createNewFolder(Collection $folderData);

    /**
     * Obtiene todas las carpetas asociadas a un proyecto y su jerarquía.
     *
     * @param int $projectId Identificador (bpin) del proyecto
     */
    public function getAllFolders(int $projectId, array $queryParams = []);

    /**
     * Obtiene la información detallada de una carpeta específica en el sistema Viper.
     *
     * @param int $folderId Identificador único de la carpeta.
     */
    public function getFolder(int $folderId);

    /**
     * Actualiza el nombre de una carpeta específica en el sistema Viper.
     *
     * @param int $folderId Identificador único de la carpeta a actualizar.
     * @param string $newName Nuevo nombre para la carpeta.
     */
    public function updateFolderName(int $folderId, string $newName);

    /**
     * Elimina una carpeta específica y todas sus subcarpetas en el sistema Viper.
     *
     * @param int $folderId Identificador único de la carpeta a eliminar.
     */
    public function deleteFolder(int $folderId);

    /**
     * Crea una jerarquía de carpetas en el sistema Viper, incluyendo subcarpetas según la estructura proporcionada.
     *
     * @param array $folderData Datos de la carpeta principal y sus subcarpetas.
     * @param int $projectId Identificador del proyecto al que pertenecen las carpetas.
     * @param array|null $parentFolder Datos de la carpeta superior (opcional) para establecer relaciones jerárquicas.
     */
    public function createFolderHierarchy($folderData, $projectId, $parentFolder = null);

    /**
     * Crea una jerarquía de carpetas en el sistema Viper para un contrato.
     *
     * @param array $contractName Nombre del tipo de contrato.
     * @param int $projectId Identificador del proyecto al que pertenecen las carpetas.
     */
    public function createFolderContract(string $contractName, string $projectId, int $responsible);

    /**
     * Obtiene todas las carpetas asociadas a un proyecto y su jerarquía para un select.
     *
     * @param int $projectId Identificador (bpin) del proyecto
     */
    public function getAllFoldersSelect(int $projectId);

    public function getFolderByNames($names);

    /**
     * Elimina todas las carpetas y subcarpetas asociadas a un proyecto en el sistema Viper.
     *
     * @param int $projectId Identificador único del proyecto.
     * @return array Resultado de la operación que puede incluir mensajes de éxito o error.
     */
    public function deleteAllFoldersByProjectId(int $projectId);
}
