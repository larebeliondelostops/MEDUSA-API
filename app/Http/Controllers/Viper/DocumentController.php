<?php

namespace App\Http\Controllers\Viper;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Interfaces\Viper\DocumentInterface;
use App\DTOs\Viper\DocumentDTO;
use Storage;

class DocumentController extends Controller
{
    private DocumentInterface $documentInterface;

    public function __construct(DocumentInterface $documentInterface)
    {
        $this->documentInterface = $documentInterface;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
    */
    public function index()
    {
        // Obtener la lista de archivos en la carpeta 'test'
        $documents = $this->documentInterface->getAllDocuments();

        return response()->json(['documents' => $documents]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'file' => 'required|file',
            'project_id' => 'required|integer',
            'folder_id' => 'required|integer',
            'responsible' => 'required|string',
        ]);

        $folderId = (int)$validatedData['folder_id'];
        $projectId = (int)$validatedData['project_id'];
        
        // Crear el DTO
        $documentDTO = new DocumentDTO(
            '',
            '',
            $validatedData['responsible'],
            $folderId,
        );
    
        $result = $this->documentInterface->createNewDocument($documentDTO, $validatedData['file'], $validatedData['project_id']);
    
        return response()->json($result, 201);
    }

    /**
     * Update the name of a specified document.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
    */
    public function update(Request $request, int $documentId)
    {
        $request->validate([
            'new_name' => 'required|string',
        ]);
    
        // Obtener el nuevo nombre desde la solicitud
        $newName = $request->input('new_name');
    
        $result = $this->documentInterface->updateDocument($documentId, $newName);
    
        // Retornar la respuesta según lo que devuelva el servicio
        return response()->json($result);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
    */
    public function destroy($documentId)
    {
        // Obtener la ruta del archivo antes de eliminarlo
        $document = $this->documentInterface->deleteDocument($documentId);
        return  response()->json($document, 200);
    }


    public function allSpaces()
    {
        $documents = $this->documentInterface->listDocumentsInSpaces('test');
        return response()->json(['documents' => $documents]);
    }

    
}
