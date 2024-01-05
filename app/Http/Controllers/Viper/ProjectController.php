<?php

namespace App\Http\Controllers\Viper;

use App\Http\Controllers\Controller;
use App\DTOs\Viper\ProjectDTO;
use App\Http\Request\Viper\ProjectRequest;
use App\Interfaces\Viper\ProjectInterface;

// Manejo de excepciones
use Illuminate\Database\QueryException;
use PDOException;
use Exception;
use Illuminate\Http\Request;

/** 
*  Space for documentation -- coming soon
**/
class ProjectController extends Controller
{
    private const DEFAULT_PROJECT_PER_PAGE = 8;
    private ProjectInterface $projectInterface;

    public function __construct(ProjectInterface $projectInterface)
    {  
       $this->projectInterface = $projectInterface; 
    }
    
    public function create(ProjectRequest $request)
    {  
        try
        {
            $validatedData = $request->validated();
            $projectDTO = new ProjectDTO($validatedData);
        
            $this->projectInterface->createNewProject($projectDTO);
            return response()->json([
                'success' => true,
                'message' => 'Project created successfully.',
                'data'    => $projectDTO->toArrayLowerCase(),
            ], 201);
        }
        catch(QueryException $e) // Error al realizar la consulta 
        {
            $errCode = $e->getCode();
            if ($errCode == 23505)
                return response()->json([
                    'success' => false,
                    'message' => 'A project with the same identifier already exists.',
                ], 409);
            else
                return response()->json([
                    'success' => false,
                    'message' => 'Error proccesing request.',
                ], 500);
        }
        catch(PDOException $e) // Error en la conexion con la DB
        {
            return response()->json([
                'success' => false,
                'message' => 'Failed to establish a connection with the database.',
            ], 500);
        }
        catch(Exception $e) // Error general 
        {
            return response()->json([
                'success' => false,
                'message' => 'An internal server error occurred.',
            ], 500);
        }
    }

    public function update(ProjectRequest $request, string $bpin)
    { 
        try
        {
            $validatedData = $request->validated();
            $projectDTO = new ProjectDTO($validatedData); 
            
            $this->projectInterface->updateProject($projectDTO, $bpin);

            return response()->json([
                'success' => true,
                'message' => 'Project updated successfully.',
                'data'    => $projectDTO->toArrayLowerCase(),
            ], 200);      
        }
        catch(Exception $e)
        {
            return response()->json([
                'success' => false,
                'message' => 'An internal server error occurred.',
            ], 500);
        }
    }

    public function list(Request $request)
    {
        try
        {
            $name = $request->input('name', null);
            $projects = $this->projectInterface->getAllProjectsPaginated(self::DEFAULT_PROJECT_PER_PAGE, $name);
            return response()->json($projects, 200);
        }
        catch(Exception $e) // Error general
        {
            return response()->json([
                'success' => false,
                'message' => 'An internal server error occurred.',
            ], 500);
        }
    }

    public function get(Request $request, string $bpin)
    {
        try  
        {
            $projectDTO = $this->projectInterface->getProjectByBPIN($bpin);
            return response()->json($projectDTO->toArrayLowerCase(), 200);
        }
        catch(Exception $e) // Error general
        {
            return response()->json([
                'success' => false,
                'message' => 'An internal server error occurred.',
            ], 500);
        }
    }

    public function delete(Request $request, string $bpin)
    {
        try  
        {
            $projectDTO = $this->projectInterface->deleteProject($bpin);
            return response()->json($projectDTO->toArrayLowerCase(), 200);
        }
        catch(Exception $e) // Error al eliminar proyecto no existente  
        {
            return response()->json([
                'success' => false,
                'message' => 'An internal server error occurred.',
            ], 500);
        }
        catch(Exception $e) // Error general
        {
            return response()->json([
                'success' => false,
                'message' => 'An internal server error occurred.',
            ], 500);
        }
    }
}