<?php

namespace App\Http\Controllers\Viper;

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
            'BPINCode' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'ocad' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'subState' => 'required|string|max:255',
            'totalValue' => 'required|numeric',
            'requestedValue' => 'required|numeric',
            'executedValue' => 'required|numeric',
            'physicalProgress' => 'required|numeric|between:0,100',
            'responsibleEntity' => 'required|string|max:255',
            'sector' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'beneficiaries' => 'required|string|max:255',
            'planner' => 'required|string|max:255',
            'executionApprovalDate' => 'required|date',
            'completionDate' => 'required|date|after_or_equal:executionApprovalDate',
            'reportingFrequency' => 'required|integer|min:1',
            'generalObjetive' => 'required|string|max:1000',
            'responsible' => 'required|string|max:255',
        ]);

        $projectDTO = new ProjectDTO($validatedData);
        $result = $this->projectInterface->createNewProject($projectDTO);

    }
}