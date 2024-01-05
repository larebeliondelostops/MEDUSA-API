<?php

namespace App\Http\Controllers\Viper;

use \DateTime;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DTOs\Viper\ProjectDTO;
use App\Interfaces\Viper\ProjectInterface;

/** 
*  Space for documentation -- coming soon
**/
class ProjectController extends Controller
{
    private ProjectInterface $projectInterface;

    public function __construct(ProjectInterface $projectInterface)
    {  
       $this->projectInterface = $projectInterface; 
    }
    
    public function create(Request $request)
    {  
        $validatedData = $request->validate([
            'bpin' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'ocad' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'substate' => 'required|string|max:255',
            'total_value' => 'required|numeric',
            'requested_value' => 'required|numeric',
            'executed_value' => 'required|numeric',
            'physical_progress' => 'required|numeric|between:0,100',
            'responsible_entity' => 'required|string|max:255',
            'sector' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'beneficiaries' => 'required|string|max:255',
            'planner' => 'required|string|max:255',
            'execution_approval_date' => 'required|date',
            'completion_date' => 'required|date|after_or_equal:execution_approval_date',
            'reporting_frequency' => 'required|integer|min:1',
            'general_objective' => 'required|string|max:1000',
            'responsible' => 'required|string|max:255',
        ]);
        
        $validatedData['execution_approval_date'] = new DateTime($validatedData['execution_approval_date']);
        $validatedData['completion_date'] = new DateTime($validatedData['completion_date']);
    
        $projectDTO = new ProjectDTO(...$validatedData);
    
        $result = $this->projectInterface->createNewProject($projectDTO);

        if ($result)
            return response()->json([
                'success' => true,
                'message' => 'Project created successfully',
                'data'    => $projectDTO,
            ], 201);
        else
            return response()->json([
                'success' => false,
                'message' => 'Error creating project',
            ], 500);

    }
}