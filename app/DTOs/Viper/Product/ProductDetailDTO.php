<?php

namespace App\DTOs\Viper\Product;

use App\DTOs\Viper\DTO;
use App\DTOs\Viper\Folder\FolderDTO;
use App\DTOs\Viper\Indicator\IndicatorDTO;
use App\DTOs\Viper\MeasurementUnit\MeasurementUnitDTO;
use App\DTOs\Viper\SpecificObjective\SpecificObjectiveDTO;

/**
 * Clase ProductDTO
 *
 * Un objeto de transferencia de datos (DTO) que representa la información de un producto en el sistema Viper.
 *
 * @package App\DTOs\Viper
 */
class ProductDetailDTO extends DTO
{
    public int $id;
    public string $name;
    public int $number;
    public int $amount;
    public FolderDTO $folder;
    public SpecificObjectiveDTO $specific_objective;
    public MeasurementUnitDTO $measurement_unit;
    public array $indicators;
}