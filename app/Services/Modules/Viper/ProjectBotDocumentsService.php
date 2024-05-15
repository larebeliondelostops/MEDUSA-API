<?php

namespace App\Services\Modules\Viper;

use App\Interfaces\Modules\Viper\ProjectBotDocumentsInterface;
use App\Models\Modules\Viper\ProjectBotDocuments;
use Illuminate\Support\Collection;

class ProjectBotDocumentsService implements ProjectBotDocumentsInterface {

    /**
     * Create a new project bot document.
     *
     * @param string $documentId The unique identifier of the document.
     * @param string $bpin The business process identification number.
     * @return Collection The newly created document.
     */
    public function store(int $documentId, string $bpin): Collection {
        // Assuming the document model accepts documentId and bpin on creation
        $document = ProjectBotDocuments::create([
            'document_id' => $documentId,
            'project_id' => $bpin
        ]);

        // Return the newly created document wrapped in a collection
        return collect([$document]);
    }

    /**
     * Retrieve all documents associated with a specific bpin.
     *
     * @param string $bpin The business process identification number.
     * @return Collection A collection of documents.
     */
    public function index($bpin): Collection {
        // Fetch documents by bpin with document information
        $files = ProjectBotDocuments::where('project_id', $bpin)->with('document')->get();
    
        return collect($files);
    }
    
}
