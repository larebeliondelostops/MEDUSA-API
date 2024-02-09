<?php

namespace App\DTOs\Viper\Folder;

use App\DTOs\Viper\DTO;

/**
 * Clase FolderDTO
 *
 * Un objeto de transferencia de datos (DTO) que representa la información de una carpeta en el sistema Viper.
 *
 * @package App\DTOs\Viper
 */
class FolderSelectDTO extends DTO
{
    /**
     * Constructor de FolderDTO.
     *
     * @param string $name Nombre de la carpeta.
     */
    public ?int $id = null;
    public string $name;
}
