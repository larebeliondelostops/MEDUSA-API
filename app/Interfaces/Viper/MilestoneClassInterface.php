<?php

namespace App\Interfaces\Viper;

use App\DTOs\Viper\MilestoneClass\MilestoneClassDTO;

interface MilestoneClassInterface {


    public function createNewMilestoneClass(MilestoneClassDTO $milestoneClassDTO): MilestoneClassDTO;

    public function updateMilestoneClass(MilestoneClassDTO $milestoneClassDTO, int $id): MilestoneClassDTO;

    public function getAllMilestoneClasses(): array;

    public function getMilestoneClass(int $id): MilestoneClassDTO;

    public function deletebMilestoneClass(int $id): MilestoneClassDTO;
}
