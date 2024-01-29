<?php

namespace App\Services\Viper;

use App\DTOs\Viper\MilestoneSubclass\MilestoneSubclassDTO;
use App\Interfaces\Viper\MilestoneSubclassInterface;
use App\Models\Viper\MilestoneSubclass;
use Exception;

class MilestoneSubclassService implements MilestoneSubclassInterface
{


    public function createNewMilestoneSubclass(MilestoneSubclassDTO $milestoneSubclassDTO): MilestoneSubclassDTO
    {
        $milestoneSubclass = new MilestoneSubclass($milestoneSubclassDTO->toArray());
        $milestoneSubclass->save();
        
        return new MilestoneSubclassDTO($milestoneSubclass->toArray());
    }

    public function updateMilestoneSubclass(MilestoneSubclassDTO $milestoneSubclassDTO, int $id): MilestoneSubclassDTO
    {
        $milestoneSubclass = MilestoneSubclass::findOrFail($id);
        $milestoneSubclass->fill($milestoneSubclassDTO->toArray());
        $milestoneSubclass->save();
        
        return new MilestoneSubclassDTO($milestoneSubclass->toArray());
    }

    public function getAllMilestoneSubclassesByMilestoneClass(int $milestoneClassId): array
    {
        $milestoneSubclasses = MilestoneSubclass::where('milestone_class_id', $milestoneClassId)->get();
    
        $milestoneSubclassDTOs = $milestoneSubclasses->map(function ($milestoneSubclass) {
            return new MilestoneSubclassDTO($milestoneSubclass->toArray());
        })->all();
    
        return $milestoneSubclassDTOs;
    }

    public function getMilestoneSubclass(int $id): MilestoneSubclassDTO
    {
        $milestoneSubclass = MilestoneSubclass::findOrFail($id);
        
        return new MilestoneSubclassDTO($milestoneSubclass->toArray());
    }

    public function deleteMilestoneSubclass(int $id): MilestoneSubclassDTO
    {
        $milestoneSubclass = MilestoneSubclass::findOrFail($id);
        $milestoneSubclassDTO = new MilestoneSubclassDTO($milestoneSubclass->toArray());
        $milestoneSubclass->delete();

        return $milestoneSubclassDTO;
    }
}
