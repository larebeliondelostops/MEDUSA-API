<?php

namespace App\Interfaces\Modules\Viper;

use Illuminate\Support\Collection;

interface PrecedenceInterface {
    
    public function getAllPrecedences(): Collection;

    public function storePrecedence(Collection $precedence): Collection;

    public function updatePrecedence(int $precedenceId, Collection $precedence);

    public function deletePrecedence(int $precedenceId);

    public function getPrecedence(int $precedenceId): Collection;
}
