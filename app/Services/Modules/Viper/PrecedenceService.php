<?php

namespace App\Services\Modules\Viper;

use Illuminate\Support\Collection;
use App\Interfaces\Modules\Viper\PrecedenceInterface;
use App\Models\Modules\Viper\Precedence;

class PrecedenceService implements PrecedenceInterface
{
    public function getAllPrecedences(): Collection
    {
        $precedenceGot = Precedence::all();

        $precedences = $precedenceGot->transform(function ($precedence) {
            return collect($precedence);
        });

        return $precedences;
    }

    public function storePrecedence(Collection $precedence): Collection
    {
        $newPrecedence = new Precedence();
        $newPrecedence->fill($precedence);
        $newprecedence->save();

        return collect($newPrecedence);
    }

    public function updatePrecedence(int $precedenceId, Collection $precedence)
    {
        $precedenceUpdate = Precedence::findOrFail($precedenceId);
        $precedenceUpdate->fill($precedence);
        $precedenceUpdate->save();
    }

    public function deletePrecedence(int $precedenceId)
    {
        $precedence = Precedence::findOrFail($precedenceId);

        $precedence->delete();
    }

    public function getPrecedence(int $precedenceId): Collection
    {
        $precedence = Precedence::findOrFail($precedenceId);

        return collect($precedence);
    }
}
