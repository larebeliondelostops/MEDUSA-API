<?php 

namespace App\Interfaces\Viper;

use App\DTOs\Viper\FolderDTO;

interface FolderInterface {
    public function createNewFolder(FolderDTO $folderDTO);
    public function getAllFolders(int $projectId);
    public function getFolder(int $folderId);
    public function updateFolderName(int $folderId, string $newName);
    public function deleteFolder(int $folderId);
}