<?php

namespace App\Http\Controllers\Viper;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DTOs\Viper\FolderDTO;
use App\Interfaces\Viper\FolderInterface;

class FolderController extends Controller
{
    private FolderInterface $folderInterface;

    public function __construct(FolderInterface $folderInterface)
    {
        $this->folderInterface = $folderInterface;
    }

    /**
     * Display a listing of the folders.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($project_id)
    {
        // Utilizar el servicio para obtener todas las carpetas filtradas por el ID del proyecto
        $folders = $this->folderInterface->getAllFolders($project_id);
    
        // Retornar la respuesta JSON con las carpetas obtenidas
        return response()->json($folders, 200);
    }

    /**
     * Store a newly created file.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'stage_id' => 'required|integer',
            'project_id' => 'required|string',
            'higher_folder_id' => 'integer',
        ]);

        // Crear el DTO
        $folderDTO = new FolderDTO(
            $validatedData['name'],
            $validatedData['stage_id'],
            $validatedData['project_id']
        );

        // Crear la carpeta y establecer la relación higherFolders si se proporciona higher_folder_id
        $result = $this->folderInterface->createNewFolder($folderDTO, $validatedData['higher_folder_id'] ?? null);

        return response()->json($result, 201);
    }

    /**
     * Display the specified folder.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($folderId)
    {
        $folders = $this->folderInterface->getFolder($folderId);
    
        // Retornar la respuesta JSON con las carpetas obtenidas
        return response()->json($folders, 200);
    }

    /**
     * Update the name of a specified folder.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $folderId)
    {
        // Buscar la carpeta por su ID
        $validatedData = $request->validate([
            'new_name' => 'required|string|max:255',
        ]);

        // Utiliza el servicio para actualizar el nombre de la carpeta
        $result = $this->folderInterface->updateFolderName($folderId, $validatedData['new_name']);

        // Retorna la respuesta JSON
        return response()->json($result);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $folderId
     * @return \Illuminate\Http\Response
     */
    public function destroy($folderId)
    {
         // Utiliza el servicio para eliminar la carpeta y sus subcarpetas
         $result = $this->folderInterface->deleteFolder($folderId);

         // Retorna la respuesta JSON
         return response()->json($result);
    }
    
}
