<?php

namespace App\Services\Viper;

use App\DTOs\Viper\Milestone\MilestoneDTO;
use App\Interfaces\Viper\MilestoneInterface;
use App\Models\Viper\Milestone;
use Exception;

class MilestoneService implements MilestoneInterface 
{
    public function createNewMilestone(MilestoneDTO $milestoneDTO): MilestoneDTO
    {
        $milestone = new Milestone($milestoneDTO->toArray());
        $milestone->save();
        
        return new MilestoneDTO($milestone->toArray());
    }

    public function updateMilestone(MilestoneDTO $milestoneDTO, int $id): MilestoneDTO
    {
        $milestone = Milestone::findOrFail($id);
        $milestone->fill($milestoneDTO->toArray());
        $milestone->save();
        
        return new MilestoneDTO($milestone->toArray());
    }

    public function getAllMilestonesByProject(int $projectId): array
    {
        $milestones = Milestone::where('project_id', $projectId)->get();
    
        $milestoneDTOs = $milestones->map(function ($milestone) {
            return new MilestoneDTO($milestone->toArray());
        })->all();
    
        return $milestoneDTOs;
    }

    public function getMilestone(int $id): MilestoneDTO
    {
        $milestone = Milestone::findOrFail($id);
        
        return new MilestoneDTO($milestone->toArray());
    }

    public function deleteMilestone(int $id): MilestoneDTO
    {
        $milestone = Milestone::findOrFail($id);
        $milestoneDTO = new MilestoneDTO($milestone->toArray());
        $milestone->delete();

        return $milestoneDTO;
    }
}
