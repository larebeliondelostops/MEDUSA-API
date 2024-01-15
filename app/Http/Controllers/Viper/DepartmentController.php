<?php

namespace App\Http\Controllers\Viper;

use App\DTOs\Viper\Department\DepartmentDTO;
use App\Http\Request\Viper\DepartmentRequest;
use App\Interfaces\Viper\DepartmentInterface;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DepartmentController extends BaseController
{
    private DepartmentInterface $departmentInterface;

    public function __construct(DepartmentInterface $departmentInterface)
    {
        parent::__construct();
        $this->departmentInterface = $departmentInterface;
    }

    public function store(DepartmentRequest $request)
    {
        try
        {
            $data = $request->validated();
            $newDepartmentDTO = new DepartmentDTO($data);
            $departmentSaved = $this->departmentInterface->createNewDepartment($newDepartmentDTO);
            return response()->json([
                "message" => "Departamento creado satisfactoriamente.",
                "data" => $departmentSaved
            ], Response::HTTP_CREATED);
        }
        catch(Exception $exception)
        {
            return $this->handleException($exception);
        }
    }

    public function index(Request $request)
    {
        try
        {
            return response()->json([
                "data"=> $this->departmentInterface->getAllDepartmentsDetail()//getAllDepartments(),
            ], Response::HTTP_OK);
        }
        catch(Exception $exception)
        {
            return $this->handleException($exception);
        }
    }

    public function show(Request $request, int $id)
    {
        try
        {
            return response()->json([
                "data" => $this->departmentInterface->getDepartmentById($id),
            ], Response::HTTP_OK);
        }
        catch(Exception $exception)
        {
            return $this->handleException($exception);
        }
    }

    public function update(DepartmentRequest $request, int $id)
    {
        try
        {
            $data = $request->validated();
            $departmentForUpdate = new DepartmentDTO($data);
            $departmentUpdated = $this->departmentInterface->updateDepartment($departmentForUpdate, $id);
            return response()->json([
                "message" => "Departamento actualizado satisfactoriamente",
                "data" => $departmentUpdated,
            ], Response::HTTP_OK);
        }
        catch(Exception $exception)
        {
            return $this->handleException($exception);
        }
    }

    public function destroy(Request $request, int $id)
    {
        try
        {
            $departmentDeleted = $this->departmentInterface->deleteDepartment($id);
            return response()->json([
                "message" => "Departamento eliminado satisfactoriamente.",
                "data"=> $departmentDeleted,
            ], Response::HTTP_OK);
        }
        catch(Exception $exception)
        {
            return $this->handleException($exception);
        }
    }
}
