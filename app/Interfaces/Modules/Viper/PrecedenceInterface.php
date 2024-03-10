<?php

namespace App\Interfaces\Modules\Viper;

use App\DTOs\Viper\Precedence\PrecedenceDTO;

interface PrecedenceInterface {
    
    public function getAllPrecedences();

    public function storePrecedence(PrecedenceDTO $precedenceDTO);

    public function updatePrecedence($precedenceId, PrecedenceDTO $precedenceDTO);

    public function deletePrecedence($precedenceId);

    public function getPrecedence($precedenceId);
}
