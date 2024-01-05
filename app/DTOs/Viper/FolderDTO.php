<?php

namespace App\DTOs\Viper;

use App\DTOs\Viper\DTO;


class FolderDTO extends DTO
{
    public function __construct(
        public string $name,
        public int $stage_id,
        public int $project_id,
    ){}
    
}
