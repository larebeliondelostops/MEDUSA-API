<?php

namespace App\Services\Modules\Viper;

use Illuminate\Support\Collection;
use App\Interfaces\Modules\Viper\PhaseInterface;
use App\Models\Modules\Viper\Phase;
use Exception;

class PhaseService implements PhaseInterface{
    
    public function createNewPhase(Collection $phase): Collection
    {
        $newPhase = new Phase($phase->toArray());
        $newPhase->save();
        
        return collect($newPhase);
    }

    public function updatePhase(Collection $phase, int $id): Collection
    {
        $phaseUpdate = Phase::findOrFail($id);
        $phaseUpdate->fill($phase->toArray());
        $phaseUpdate->save();
        
        return collect($phaseUpdate);
    }

    public function getAllPhases(): Collection
    {
        $phases = Phase::orderBy('created_at', 'asc')->get();

        $phases = $phases->transform(function ($phase) {
            return collect($phase);
        });

        return $phases;
    }

    public function getPhase(int $id): Collection
    {
        $phase = Phase::findOrFail($id);
        
        return collect($phase);
    }

    public function deletePhase(int $id): Collection
    {
        $phase = Phase::findOrFail($id);
        $phase->delete();

        return collect($phase);
    }
}
