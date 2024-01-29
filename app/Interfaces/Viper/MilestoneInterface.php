<?php

namespace App\Interfaces\Viper;

use App\DTOs\Viper\Milestone\MilestoneDTO;

interface MilestoneInterface {


    public function createNewMilestone(MilestoneDTO $alertDTO): MilestoneDTO;

    public function updateMilestone(MilestoneDTO $milestoneDTO, int $id): MilestoneDTO;

    public function getAllMilestonesByProject(int $projectId): array;

    public function getMilestone(int $id): MilestoneDTO;

    public function deleteMilestone(int $id): MilestoneDTO;
}
