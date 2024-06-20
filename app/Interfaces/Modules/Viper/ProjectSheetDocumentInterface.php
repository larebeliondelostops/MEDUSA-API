<?php

namespace App\Interfaces\Modules\Viper;

use Illuminate\Support\Collection;

interface ProjectSheetDocumentInterface {

    public function createNewProjectSheetDocument(Collection $projectSheetDocument, \Illuminate\Http\UploadedFile $file): Collection;

    public function updateProjectSheetDocument(Collection $projectSheetDocument, int $id): Collection;

    public function addDocumentToProjectSheetDocument(\Illuminate\Http\UploadedFile $file, int $id): Collection;

    public function getProjectSheetDocumentByProject(int $projectId): Collection;

    public function getProjectSheetDocument(int $id): Collection;

    public function deleteProjectSheetDocument(int $id): Collection;
}
