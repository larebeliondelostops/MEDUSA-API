<?php

namespace App\Services\Modules\Viper;

use Illuminate\Support\Collection;
use App\Interfaces\Modules\Viper\ProjectSheetDocumentInterface;
use App\Interfaces\Modules\Viper\ProjectSheetInterface;
use App\Interfaces\Modules\Viper\FolderInterface;
use App\Interfaces\Modules\Viper\DocumentInterface;
use App\Models\Modules\Viper\ProjectSheetDocument;
use App\Models\Modules\Viper\Phase;
use Exception;

class ProjectSheetDocumentService implements ProjectSheetDocumentInterface{

    private ProjectSheetInterface $projectSheetInterface;
    private FolderInterface $folderInterface;
    private DocumentInterface $documentInterface;

    public function __construct(ProjectSheetInterface $projectSheetInterface, FolderInterface $folderInterface, DocumentInterface $documentInterface)
    {
        $this->projectSheetInterface = $projectSheetInterface;
        $this->folderInterface = $folderInterface;
        $this->documentInterface = $documentInterface;
    }
    
    public function createNewProjectSheetDocument(Collection $projectSheetDocument, ?\Illuminate\Http\UploadedFile $file = null): Collection
    {
        $newProjectSheetDocument = new ProjectSheetDocument($projectSheetDocument->toArray());
        if ($file != null) {
            $projectSheet = $this->projectSheetInterface->getProjectSheet($projectSheetDocument["project_sheet_id"]);
            $folder =  $this->folderInterface->getFolderByNames($projectSheet['location']);
            $document = collect([
                'folder_id' => $folder['id'],
                'project_id' => $projectSheetDocument["project_id"]
            ]);

            $newProjectSheetDocument->document_id = $this->documentInterface->createNewDocument($document, $file)['id'];
        }
        $newProjectSheetDocument->save();
        
        return collect($newProjectSheetDocument);
    }

    public function updateProjectSheetDocument(Collection $projectSheetDocument, int $id): Collection
    {
        $projectSheetDocumentUpdate = ProjectSheetDocument::findOrFail($id);
        $projectSheetDocumentUpdate->fill($projectSheetDocument->toArray());
        $projectSheetDocumentUpdate->save();
        
        return collect($projectSheetDocumentUpdate);
    }

    public function addDocumentToProjectSheetDocument(\Illuminate\Http\UploadedFile $file, int $id): Collection
    {
        $projectSheetDocumentUpdate = ProjectSheetDocument::findOrFail($id);
        
        if ($file != null) {
            $projectSheet = $this->projectSheetInterface->getProjectSheet($projectSheetDocumentUpdate->project_sheet_id);
            $folder =  $this->folderInterface->getFolderByNames($projectSheet['location']);
            $document = collect([
                'folder_id' => $folder['id'],
                'project_id' => $projectSheetDocumentUpdate->project_id
            ]);

            $projectSheetDocumentUpdate->document_id = $this->documentInterface->createNewDocument($document, $file)['id'];
        }

        $projectSheetDocumentUpdate->save();
        
        return collect($projectSheetDocumentUpdate);
    }

    public function getProjectSheetDocumentByProject(int $projectId): Collection
    {
        $phases = Phase::orderBy('created_at', 'asc')
        ->get();

        $result = collect();

        foreach ($phases as $phase) {
            $phaseData = [
                'id' => $phase->id,
                'name' => $phase->name,
                'project_sheet_documents' => collect(),
            ];

            $projectSheetDocuments = ProjectSheetDocument::whereHas('projectSheet', function ($query) use ($phase) {
                $query->where('phase_id', $phase->id);
            })
            ->with(['projectSheet', 'document'])
            ->orderBy('created_at', 'asc')
            ->get();
    
            foreach ($projectSheetDocuments as $projectSheetDocument) {
                unset($projectSheetDocument->projectSheet->phase_id);
                unset($projectSheetDocument->document_id);
                unset($projectSheetDocument->project_id);
                unset($projectSheetDocument->project_sheet_id);

                $phaseData['project_sheet_documents']->push($projectSheetDocument);
            }

            $result->push($phaseData);
        }

        return $result;
    }

    public function getProjectSheetDocument(int $id): Collection
    {
        $projectSheetDocument = ProjectSheetDocument::findOrFail($id);
        
        return collect($projectSheetDocument);
    }

    public function deleteProjectSheetDocument(int $id): Collection
    {
        $projectSheetDocument = ProjectSheetDocument::findOrFail($id);
        $projectSheetDocument->delete();

        return collect($projectSheetDocument);
    }
}
