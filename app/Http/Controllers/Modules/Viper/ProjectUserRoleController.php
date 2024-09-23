<?php

namespace App\Http\Controllers\Modules\Viper;

use App\Http\Controllers\Controller;
use App\Http\Request\Modules\Viper\ProjectUserRoleRequest;
use App\Interfaces\Modules\Viper\ProjectUserRoleInterface;
use Exception;
use Illuminate\Http\Request;

class ProjectUserRoleController extends BaseController
{

    private ProjectUserRoleInterface $projectUserRoleInterface;

    public function __construct(ProjectUserRoleInterface $projectUserRoleInterface)
    {
        parent::__construct();
        $this->projectUserRoleInterface = $projectUserRoleInterface;
    }

    public function store(ProjectUserRoleRequest $request)
    {
        try {
            $projectUserRoleCreated = $this->projectUserRoleInterface->createNewProjectUserRole(collect($request->validated()));

            return response()->json([
                'message' => 'Project User Role created successfully.',
                'data'    => $projectUserRoleCreated
            ], 201);
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }

    public function update(ProjectUserRoleRequest $request, int $id)
    {
        try {
            $projectUserRoleUpdated = $this->projectUserRoleInterface->updateprojectUserRole(collect($request->validated()), $id);

            return response()->json([
                'message' => 'Project User Role updated successfully.',
                'data'    => $projectUserRoleUpdated,
            ], 200);
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }

    public function index(string $projectId)
    {
        try {
            $projectUserRoles = $this->projectUserRoleInterface->getAllProjectUserRoleByProject($projectId);
            return response()->json([
                'data' => $projectUserRoles,
            ], 200);
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }

    public function show(int $id)
    {
        try {
            $projectUserRoles = $this->projectUserRoleInterface->getProjectUserRole($id);
            return response()->json([
                'data' => $projectUserRoles,
            ], 200);
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }

    public function destroy(int $id)
    {
        try {
            $projectUserRole = $this->projectUserRoleInterface->deleteProjectUserRole($id);
            return response()->json([
                'message' => 'Project User Role deleted successfully',
                'data'=> $projectUserRole
            ],200);
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }
}
