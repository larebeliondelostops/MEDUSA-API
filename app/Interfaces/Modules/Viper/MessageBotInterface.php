<?php

namespace App\Interfaces\Modules\Viper;

use Illuminate\Support\Collection;


interface MessageBotInterface {

    public function createNewMessageBot(Collection $messageBot): Collection;

    public function updateMessageBot(Collection $messageBot, int $id): Collection;

    public function getAllMessageBotByProjectUserRole(int $projectUserRoleId): Collection;

    public function getMessageBot(int $id): Collection;

    public function deleteMessageBot(int $id): Collection;
}
