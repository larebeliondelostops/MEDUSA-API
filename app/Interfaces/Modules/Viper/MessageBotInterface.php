<?php

namespace App\Interfaces\Modules\Viper;

use Illuminate\Support\Collection;


interface MessageBotInterface {

    public function createNewMessageBot(string $question, string $bpin): Collection;

    public function uploadFiles(int $fileId, string $bpin): Collection;

    public function getAllMessageBotByProjectUserRole(int $bpin): Collection;

    public function getMessageBot(int $id): Collection;

    public function deleteMessageBot(int $id): Collection;
}
