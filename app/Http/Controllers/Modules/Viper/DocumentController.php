<?php

namespace App\Http\Controllers\Modules\Viper;

use Illuminate\Http\Request;
use App\Http\Request\Viper\DocumentRequest;
use App\Interfaces\Modules\Viper\DocumentInterface;

/**
 * Controlador que maneja todo lo que tiene que ver con las los documentos almacenados en spaces de Digital Ocean
 *
 * Controlador que maneja la logica para la creacion, actualizacion, eliminacion y consulta de los documentos en los proyectos de Viper
 *
 * @package    App\Http\Controllers\Viper
 * @copyright  2024 Ignicion S.A.S.
 * @author     Daniel Alferez <dan.alferez1@gmail.com>
 * @version    v1.0.0
 */

class DocumentController extends BaseController
{
    private DocumentInterface $documentInterface;

    public function __construct(DocumentInterface $documentInterface)
    {
        parent::__construct(); // Se tiene que llamar al contructor padre para que se configure correctamente el BaseController
        $this->documentInterface = $documentInterface;
    }

    /**
     * Mostrar una lista de los recursos.
     *
     * @return \Illuminate\Http\Response
    */
    public function index(Request $request, int $projectId)
    {
        try {
            $queryFilterParam = $request->query();
            // Obtener la lista de documentos.
            $documents = $this->documentInterface->getAllDocuments($queryFilterParam, $projectId);
    
            return response()->json(['data' => $documents]);
        } catch (\Exception $exception) {
            return $this->handleException($exception);
        }
    }

    /**
     * Almacenar un nuevo recurso en el almacenamiento.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
    */
    public function store(DocumentRequest $request)
    {
        try {
            $uploadedFiles = $request->file('files');

            $results = [];

            foreach ($uploadedFiles as $file) {
                $result = $this->documentInterface->createNewDocument(collect($request->validated()), $file);
                $results[] = $result;
            }

            return response()->json(['data' => $results], 201);
        } catch (\Exception $exception) {
            return $this->handleException($exception);
        }
    }

    /**
     * Actualizar el nombre de un documento especificado.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $documentId
     * @return \Illuminate\Http\Response
    */
    public function update(Request $request, int $documentId)
    {
        try {
            $request->validate([
                'new_name' => 'required|string',
            ]);
        
            // Obtener el nuevo nombre desde la solicitud.
            $newName = $request->input('new_name');
        
            $result = $this->documentInterface->updateDocument($documentId, $newName);
        
            // Retornar la respuesta según lo que devuelva el servicio.
            return response()->json($result, 200);
        } catch (\Exception $exception) {
            return $this->handleException($exception);
        }
    }

    /**
     * Eliminar logicamente el recurso especificado del almacenamiento.
     *
     * @param  int  $documentId
     * @return \Illuminate\Http\Response
    */
    public function destroy($documentId)
    {
        try {
            // Obtener la ruta del archivo antes de eliminarlo.
            $document = $this->documentInterface->deleteDocument($documentId);
            return  response()->json($document, 200);
        } catch (\Exception $exception) {
            return $this->handleException($exception);
        }
    }


    /**
     * Eliminar fisicamente el recurso especificado del almacenamiento.
     *
     * @param  int  $documentId
     * @return \Illuminate\Http\Response
    */
    public function destroyForce($documentId)
    {
        try {
            // Obtener la ruta del archivo antes de eliminarlo.
            $document = $this->documentInterface->deleteForceDocument($documentId);
            return  response()->json($document, 200);
        } catch (\Exception $exception) {
            return $this->handleException($exception);
        }
    }

    /**
     * Obtener todos los documentos en los espacios de almacenamiento.
     *
     * @return \Illuminate\Http\Response
     */
    public function allSpaces()
    {
        try {
            $documents = $this->documentInterface->listDocumentsInSpaces('test');
            return response()->json(['data' => $documents]);
        } catch (\Exception $exception) {
            return $this->handleException($exception);
        }
    }

    /**
     * Obtiene los documentos eliminados por carpeta lógicamente del sistema Viper.
     *
     * @return \Illuminate\Http\Response
     */
    public function getDeletedDocumentsByFolder(int $folderId){
        try {
            $documents = $this->documentInterface->getDeletedDocumentsByFolder($folderId);
            return response()->json(['data' => $documents]);
        } catch (\Exception $exception) {
            return $this->handleException($exception);
        }
    }


    /**
     * Obtiene los documentos por carpeta del sistema Viper.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexByFolder($folderId)
    {
        try {
            // Obtener la lista de documentos.
            $documents = $this->documentInterface->getDocumentsByFolder($folderId);
    
            return response()->json(['data' => $documents]);
        } catch (\Exception $exception) {
            return $this->handleException($exception);
        }
    }


    
    /**
     * Obtiene los documentos pro proyect eliminados lógicamente del sistema Viper.
     *
     * @return \Illuminate\Http\Response
     */
    public function getDeletedDocumentsByProject(int $projectId){
        try {
            $documents = $this->documentInterface->getDeletedDocumentsByProject($projectId);
            return response()->json(['data' => $documents]);
        } catch (\Exception $exception) {
            return $this->handleException($exception);
        }
    }


    /**
     * Elimina lógicamente varios documentos del sistema Viper.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroySeveral(Request $request)
    {
        try {
            // Obtener los identificadores de documentos desde la solicitud
            $documentIds = $request->input('document_ids', []);

            // Verificar si se proporcionaron identificadores de documentos
            if (empty($documentIds)) {
                return response()->json(['message' => 'No se proporcionaron identificadores de documentos.'], 400);
            }

            // Eliminar lógicamente los documentos
            $result = $this->documentInterface->deleteMultipleDocuments($documentIds);

            return response()->json($result, 200);
        } catch (\Exception $exception) {
            return $this->handleException($exception);
        }
    }

    /**
     * Elimina físicamente varios documentos del sistema Viper.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroyForceSeveral(Request $request)
    {
        try {
            // Obtener los identificadores de documentos desde la solicitud
            $documentIds = $request->input('document_ids', []);

            // Verificar si se proporcionaron identificadores de documentos
            if (empty($documentIds)) {
                return response()->json(['message' => 'No se proporcionaron identificadores de documentos.'], 400);
            }

            // Eliminar físicamente los documentos
            $result = $this->documentInterface->deleteForceMultipleDocuments($documentIds);

            return response()->json($result, 200);
        } catch (\Exception $exception) {
            return $this->handleException($exception);
        }
    }

    /**
     * Recupera lógicamente un documento eliminado por carpeta en el sistema Viper.
     *
     * @param DocumentRequest $request
     * @return \Illuminate\Http\Response
     */
    public function restoreDocument(Request $request, int $documentId)
    {
        try {
            $folderId = $request->input('folder_id');

            // Recupera lógicamente el documento y lo asigna a la nueva carpeta
            $restoredDocument = $this->documentInterface->restoreDocument($documentId, $folderId);

            return response()->json($restoredDocument, 200);
        } catch (\Exception $exception) {
            return $this->handleException($exception);
        }
    }
}
