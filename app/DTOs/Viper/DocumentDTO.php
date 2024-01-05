<?php

namespace App\DTOs\Viper;

use App\DTOs\Viper\DTO;

class DocumentDTO extends DTO
{
    public function __construct(
        public ?string $name = '',
        public ?string $url = '',
        public string $responsible,
        public int $folder_id,
    ){}
}
