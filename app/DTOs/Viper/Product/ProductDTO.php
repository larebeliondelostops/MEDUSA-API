<?php

namespace App\DTOs\Viper\Product;

use App\DTOs\Viper\DTO;

/**
 * Clase ProductDTO
 *
 * Un objeto de transferencia de datos (DTO) que representa la información de un producto en el sistema Viper.
 *
 * @package App\DTOs\Viper
 */
class ProductDTO extends DTO
{
    /**
     * @param string $name Nombre del producto.
     */
    public ?int $id = null;
    public string $name;
    public ?int $number = null;
    public int $amount;
    public ?int $folder_id = null;
    public int $specific_objective_id;
    public int $measurement_unit_id;
}