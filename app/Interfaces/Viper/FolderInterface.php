<?php

namespace App\Interfaces\Viper;

use App\DTOs\Viper\FolderDTO;

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
     * @param FolderDTO $folderDTO Datos de la carpeta a crear.
     * @param int $higherFolderId Identificador de la carpeta padre (si tiene)
     */
    public function createNewFolder(FolderDTO $folderDTO, int $higherFolderId);

    /**
     * Obtiene todas las carpetas asociadas a un proyecto y su jerarquía.
     *
     * @param int $projectId Identificador (bpin) del proyecto
     */
    public function getAllFolders(int $projectId);

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
}
