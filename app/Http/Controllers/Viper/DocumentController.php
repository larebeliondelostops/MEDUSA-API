<?php

namespace App\Http\Controllers\Viper;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Interfaces\Viper\DocumentInterface;
use App\DTOs\Viper\DocumentDTO;
use Storage;

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

class DocumentController extends Controller
{
    private DocumentInterface $documentInterface;

    public function __construct(DocumentInterface $documentInterface)
    {
        $this->documentInterface = $documentInterface;
    }

    /**
     * Mostrar una lista de los recursos.
     *
     * @return \Illuminate\Http\Response
    */
    public function index()
    {
        try {
            // Obtener la lista de documentos.
            $documents = $this->documentInterface->getAllDocuments();
    
            return response()->json(['data' => $documents]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Almacenar un nuevo recurso en el almacenamiento.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'files.*' => 'required|file',
                'project_id' => 'required|integer',
                'folder_id' => 'required|string',
                'responsible' => 'required|string',
            ]);

            $folderId = (int)$validatedData['folder_id'];

            $uploadedFiles = $request->file('files');

            $results = [];

            foreach ($uploadedFiles as $file) {
                // Crear un DTO para cada archivo.
                $documentDTO = new DocumentDTO(
                    '',
                    '',
                    $validatedData['responsible'],
                    $folderId
                );

                // Crear y almacenar cada documento.
                $result = $this->documentInterface->createNewDocument($documentDTO, $file, $validatedData['project_id']);
                $results[] = $result;
            }

            return response()->json(['data' => $results], 201);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['error' => $e->errors()], 422);
        } catch (\Exception $e) {
            if ($e->getCode() === 404) {
                return response()->json(['error' => $e->getMessage()], 404);
            }
            return response()->json(['error' => $e->getMessage()], 500);
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
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['error' => $e->errors()], 422);
        } catch (\Exception $e) {
            if ($e->getCode() === 404) {
                return response()->json(['error' => $e->getMessage()], 404);
            }
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Eliminar el recurso especificado del almacenamiento.
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
        } catch (\Exception $e) {
            if ($e->getCode() === 404) {
                return response()->json(['error' => $e->getMessage()], 404);
            }
            return response()->json(['error' => $e->getMessage()], 500);
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
        } catch (\Exception $e) {
            if ($e->getCode() === 404) {
                return response()->json(['error' => $e->getMessage()], 404);
            }
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
