<?php

namespace App\Http\Controllers\Modules\Viper;

use Illuminate\Http\Request;
use App\Http\Request\Modules\Viper\FolderRequest;
use App\Interfaces\Modules\Viper\FolderInterface;

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
    public function index(Request $request, $project_id)
    {
        try {
            $queryFilterParam = $request->query();
            // Utilizar el servicio para obtener todas las carpetas filtradas por el ID del proyecto
            $folders = $this->folderInterface->getAllFolders($project_id, $queryFilterParam);
        
            // Retornar la respuesta JSON con las carpetas obtenidas
            return response()->json([
                'data' => $folders,
            ], 200);
        } catch (\Exception $exception) {
            return $this->handleException($exception);
        }
    }

    /**
     * Almacenar un nuevo archivo.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FolderRequest $request)
    {
        try {
            // Crear la carpeta y establecer la relación higherFolders si se proporciona higher_folder_id
            $result = $this->folderInterface->createNewFolder(collect($request->validated()));
            
            return response()->json([
                'message' => 'Carpeta Creado Exitosamente.',
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
            return response()->json(['message' => 'Carpeta y subcarpetas eliminadas correctamente'], 200);
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


    /**
     * Almacenar varias carpetas con jerarquía asignadas a un contrato.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeContract(Request $request)
    {
        try {
            $jsonData = $request->json()->all();
            $projectId = $jsonData['project_id'];
            $contractName = $jsonData['contract_name'];

            $this->folderInterface->createFolderContract($contractName, $projectId);

            return response()->json(['message' => 'Carpetas creadas exitosamente'], 200);
        } catch (\Exception $exception) {
            return $this->handleException($exception);
        }
    }


    /**
     * Mostrar una lista de carpetas para un select.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexSelect(Request $request, $project_id)
    {
        try {
            // Utilizar el servicio para obtener todas las carpetas filtradas por el ID del proyecto
            $folders = $this->folderInterface->getAllFoldersSelect($project_id);
        
            // Retornar la respuesta JSON con las carpetas obtenidas
            return response()->json([
                'data' => $folders,
            ], 200);
        } catch (\Exception $exception) {
            return $this->handleException($exception);
        }
    }


    /**
     * Eliminar las carpetas asociadas a un proyecto especifico.
     *
     * @param  int  $projectId bpin del proyecto a borrar las carpetas
     * @return \Illuminate\Http\Response
     */
    public function destroyByProject($projectId){
        try {
            // Utilizar el servicio para obtener todas las carpetas filtradas por el ID del proyecto
            $folders = $this->folderInterface->deleteAllFoldersByProjectId($projectId);
        
            // Retornar la respuesta JSON con las carpetas obtenidas
            return response()->json(['message' => 'Todas las carpetas y subcarpetas del proyecto fueron eliminadas correctamente'], 200);
        } catch (\Exception $exception) {
            return $this->handleException($exception);
        }
    }

}
