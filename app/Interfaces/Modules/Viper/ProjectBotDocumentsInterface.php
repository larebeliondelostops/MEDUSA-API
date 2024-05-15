<?php

namespace App\Interfaces\Modules\Viper;

use Illuminate\Support\Collection;


interface ProjectBotDocumentsInterface {

    public function store(int $documentId, string $bpin): Collection;

    public function index(string $bpin): Collection;

}
