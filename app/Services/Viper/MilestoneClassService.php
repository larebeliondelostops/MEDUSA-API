<?php

namespace App\Services\Viper;

use App\DTOs\Viper\MilestoneClass\MilestoneClassDTO;
use App\Interfaces\Viper\MilestoneClassInterface;
use App\Models\Viper\MilestoneClass;
use Exception;

class MilestoneClassService implements  MilestoneClassInterface 
{


    public function createNewMilestoneClass(MilestoneClassDTO $milestoneClassDTO): MilestoneClassDTO
    {
        $milestoneClass = new MilestoneClass($milestoneClassDTO->toArray());
        $milestoneClass->save();
        
        return new MilestoneClassDTO($milestoneClass->toArray());
    }

    public function updateMilestoneClass(MilestoneClassDTO $milestoneClassDTO, int $id): MilestoneClassDTO
    {
        $milestoneClass = MilestoneClass::findOrFail($id);
        $milestoneClass->fill($milestoneClassDTO->toArray());
        $alert->save();
        
        return new MilestoneClassDTO($milestoneClass->toArray());
    }

    public function getAllMilestoneClasses(): array
    {
        $milestoneClasses = Sector::all();
        $milestoneClassDTOs = [];

        foreach ($milestoneClasses as $milestoneClass) {
            $milestoneClassDTOs[] = new SectorDTO($milestoneClasses->toArray());
        }

        return $milestoneClassDTOs;
    }

    public function getMilestoneClass(int $id): MilestoneClassDTO
    {
        $milestoneClass = MilestoneClass::findOrFail($id);
        
        return new MilestoneClassDTO($milestoneClass->toArray());
    }

    public function deletebMilestoneClass(int $id): MilestoneClassDTO
    {
        $milestoneClass = MilestoneClass::findOrFail($id);
        $milestoneClassDTO = new MilestoneClassDTO($milestoneClass->toArray());
        $milestoneClass->delete();

        return $milestoneClassDTO;
    }
}
