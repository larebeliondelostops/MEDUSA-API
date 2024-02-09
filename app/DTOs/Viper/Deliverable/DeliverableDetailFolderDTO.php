<?php

namespace App\DTOs\Viper\Deliverable;
use App\DTOs\Viper\DTO;
use App\DTOs\Viper\Folder\FolderDTO;

class DeliverableDetailFolderDTO extends DTO
{
    public ?int $id = null;
    public int $number; // Numero del deliverable
    public string $name; // Nombre del deliverable
    public ?int $activity_quantity = null;
    public ?float $value = null;
    public ?int $product_id = null;
    public ?int $deliverable_id = null;
    public ?FolderDTO $folder = null;
}
