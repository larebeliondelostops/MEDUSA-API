<?php

namespace App\Interfaces\Viper;

use App\DTOs\Viper\MilestoneSubclass\MilestoneSubclassDTO;

interface MilestoneSubclassInterface {


    public function createNewMilestoneSubclass(MilestoneSubclassDTO $milestoneSubclassDTO): MilestoneSubclassDTO;

    public function updateMilestoneSubclass(MilestoneSubclassDTO $milestoneSubclassDTO, int $id): MilestoneSubclassDTO;

    public function getAllMilestoneSubclassesByMilestoneClass(int $milestoneClassId): array;

    public function getMilestoneSubclass(int $id): MilestoneSubclassDTO;

    public function deleteMilestoneSubclass(int $id): MilestoneSubclassDTO;
}
