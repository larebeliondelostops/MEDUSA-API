<?php

namespace App\DTOs\Viper\Document;

use App\DTOs\Viper\DTO;

/**
 * Clase DocumentDTO
 *
 * Un objeto de transferencia de datos (DTO) que representa la información de un documento en el sistema Viper.
 *
 * @package App\DTOs\Viper
 * @copyright  2024 Ignicion S.A.S.
 * @author     Daniel Alferez <dan.alferez1@gmail.com>
 * @version    v1.0.0
 */
class DocumentDTO extends DTO
{
    /**
     * Constructor de DocumentDTO.
     *
     * @param string|null $name Nombre del documento.
     * @param string|null $url URL del documento.
     * @param string $responsible Responsable del documento.
     * @param int $folder_id Identificador de la carpeta a la que pertenece el documento.
     */
    public ?int $id = null;
     public ?string $name = '';
    public ?string $url = '';
    public string $responsible;
    public int $folder_id;
}
