<?php

namespace App\Http\Controllers\Modules\Viper;

use App\Http\Controllers\Controller;
use App\Http\Request\Modules\Viper\ProjectContractRequest;
use App\Interfaces\Modules\Viper\ProjectContractInterface;
use Exception;
use Illuminate\Http\Request;

class ProjectContractController extends BaseController
{
    private ProjectContrarInterface $projectContrarInterface;


    public function __construct(ProjectContrarInterface $projectContrarInterface)
    {
        parent::__construct();
        $this->projectContrarInterface = $projectContrarInterface;
    }


    public function store(ProjectContrarRequest $request)
    {
        try {
            $projectContrarCreated = $this->projectContrarInterface->createNewProjectContrar(collect($request->validated()));

            return response()->json([
                'message' => 'Project Contrar created successfully.',
                'data'    => $projectContrarCreated
            ], 201);
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }
}
