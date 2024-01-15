<?php

namespace App\Http\Controllers\Viper;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DTOs\Viper\Folder\FolderDTO;
use App\Interfaces\Viper\FolderInterface;

/**
 * Controlador que maneja todo lo que tiene que ver con las carperta
 *
 * Controlador que maneja la logica para la creacion, actualizacion, eliminacion y consulta de las carpetas en los proyectos de Viper
 *
 * @package    App\Http\Controllers\Viper
 * @copyright  2024 Ignicion S.A.S.
 * @author     Daniel Alferez <dan.alferez1@gmail.com>
 * @version    v1.0.0
 */

class FolderController extends BaseController
{
    private FolderInterface $folderInterface;

    public function __construct(FolderInterface $folderInterface)
    {
        parent::__construct(); // Se tiene que llamar al contructor padre para que se configure correctamente el BaseController
        $this->folderInterface = $folderInterface;
    }

     /**
     * Mostrar una lista de carpetas.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($project_id)
    {
        // Utilizar el servicio para obtener todas las carpetas filtradas por el ID del proyecto
        $folders = $this->folderInterface->getAllFolders($project_id);
    
        // Retornar la respuesta JSON con las carpetas obtenidas
        return response()->json([
            'data' => $folders,
        ], 200);
    }

    /**
     * Almacenar un nuevo archivo.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'stage_id' => 'required|integer',
                'project_id' => 'required|string',
                'higher_folder_id' => 'integer',
            ]);

            $folderDTO = new FolderDTO($validatedData);
            // Crear la carpeta y establecer la relación higherFolders si se proporciona higher_folder_id
            $result = $this->folderInterface->createNewFolder($folderDTO, $validatedData['higher_folder_id'] ?? null);
            
            return response()->json([
                'message' => 'Proyecto Creado Exitosamente.',
                'data'    => $result,
            ], 201); 
        } catch (\Exception $exception) {
            return $this->handleException($exception);
        }
    }

    /**
     * Mostrar la carpeta especificada.
     *
     * @param  int  $folderId
     * @return \Illuminate\Http\Response
     */
    public function show($folderId)
    {
        try {
            $folder = $this->folderInterface->getFolder($folderId);
            return response()->json([
                'data' => $folder,
            ], 200); 
        } catch (\Exception $exception) {
            return $this->handleException($exception);
        }
    }

    /**
     * Actualizar el nombre de una carpeta especificada.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $folderId
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $folderId)
    {
        try {
            $validatedData = $request->validate([
                'new_name' => 'required|string|max:255',
            ]);

            // Utiliza el servicio para actualizar el nombre de la carpeta
            $result = $this->folderInterface->updateFolderName($folderId, $validatedData['new_name']);

            // Retorna la respuesta JSON
            return response()->json([
                'message' => 'Nombre de carpeta actualizado correctamente',
                'data' => $result
            ], 200);
        } catch (\Exception $exception) {
            return $this->handleException($exception);
        }
    }

    /**
     * Eliminar el recurso especificado del almacenamiento.
     *
     * @param  int  $folderId
     * @return \Illuminate\Http\Response
     */
    public function destroy($folderId)
    {
        try {
            $result = $this->folderInterface->deleteFolder($folderId);
            return response()->json($result);
        } catch (\Exception $exception) {
            return $this->handleException($exception);
        }
    }

    /**
     * Almacenar varias carpetas con jerarquía.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeMultiple(Request $request)
    {
        try {
            $jsonData = $request->json()->all();
            $projectId = $jsonData['project_id'];
            $foldersData = $jsonData['folders'];

            foreach ($foldersData as $folderData) {
                $this->folderInterface->createFolderHierarchy($folderData, $projectId);
            }

            return response()->json(['message' => 'Carpetas creadas exitosamente'], 200);
        } catch (\Exception $exception) {
            return $this->handleException($exception);
        }
    }

}
