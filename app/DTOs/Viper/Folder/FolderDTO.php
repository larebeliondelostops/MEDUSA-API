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
class FolderDTO extends DTO
{
    /**
     * Constructor de FolderDTO.
     *
     * @param string $name Nombre de la carpeta.
     * @param int $stage_id Identificador de la etapa a la que pertenece la carpeta.
     * @param string $project_id Identificador del proyecto al que pertenece la carpeta.
     * @param int|null $higher_folder_id Identificador de la carpeta padre (puede ser nulo).
     */
    public ?int $id = null;
    public string $name;
    public int $stage_id;
    public ?string $responsible = null;
    public string $project_id;
    public ?int $higher_folder_id = null;
}
