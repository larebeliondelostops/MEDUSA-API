<?php

namespace App\Http\Controllers\Modules\Viper;

use App\Http\Controllers\Controller;
use App\Http\Request\Modules\Viper\ProjectContractRequest;
use App\Interfaces\Modules\Viper\ProjectContractInterface;
use Exception;
use Illuminate\Http\Request;

class ProjectContractController extends BaseController
{
    private ProjectContractInterface $projectContractInterface;


    public function __construct(ProjectContractInterface $projectContractInterface)
    {
        parent::__construct();
        $this->projectContractInterface = $projectContractInterface;
    }


    public function store(ProjectContractRequest $request)
    {
        try {
            $this->projectContractInterface->createNewProjectContract(collect($request->validated()));

            return response()->json([
                'message' => 'Project Contrar created successfully.',
            ], 201);
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }
}
