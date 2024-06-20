<?php

namespace App\Http\Controllers\Modules\Viper;

use App\Http\Controllers\Controller;
use App\Http\Request\Modules\Viper\ProjectSheetDocumentRequest;
use App\Interfaces\Modules\Viper\ProjectSheetDocumentInterface;
use Exception;
use Illuminate\Http\Request;


class ProjectSheetDocumentController extends BaseController
{
    private ProjectSheetDocumentInterface $projectSheetDocumentInterface;

    public function __construct(ProjectSheetDocumentInterface $projectSheetDocumentInterface)
    {
        parent::__construct();
        $this->projectSheetDocumentInterface = $projectSheetDocumentInterface;
    }

    public function store(ProjectSheetDocumentRequest $request)
    {
        try {
            $file = $request->hasFile('file') ? $request->file('file') : null;

            $projectSheetDocumentCreated = $this->projectSheetDocumentInterface->createNewProjectSheetDocument(collect($request->validated()),$file);

            return response()->json([
                'message' => 'Project Sheet Document created successfully.',
                'data'    => $projectSheetDocumentCreated
            ], 201);
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }

    public function update(ProjectSheetDocumentRequest $request, int $id)
    {
        try {
            $projectSheetDocumentUpdated = $this->projectSheetDocumentInterface->updateProjectSheetDocument(collect($request->validated()), $id);

            return response()->json([
                'message' => 'Project Sheet Document updated successfully.',
                'data'    => $projectSheetDocumentUpdated,
            ], 200);
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }

    public function add(Request $request, int $id)
    {
        try {
            $request->validate([
                'file' => 'required|file',
            ]);

            $file = $request->file('file');

            $projectSheetDocumentUpdated = $this->projectSheetDocumentInterface->addDocumentToProjectSheetDocument($file, $id);

            return response()->json([
                'message' => 'Project Sheet Document updated successfully.',
                'data'    => $projectSheetDocumentUpdated,
            ], 200);
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }


    public function index(int $projectId)
    {
        try {
            $projectSheetDocuments = $this->projectSheetDocumentInterface->getProjectSheetDocumentByProject($projectId);
            return response()->json([
                'data' => $projectSheetDocuments,
            ], 200);
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }

    public function show(int $id)
    {
        try {
            $projectSheetDocuments = $this->projectSheetDocumentInterface->getProjectSheetDocument($id);
            return response()->json([
                'data' => $projectSheetDocuments,
            ], 200);
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }

    public function destroy(int $id)
    {
        try {
            $projectSheetDocument = $this->projectSheetDocumentInterface->deleteProjectSheetDocument($id);
            return response()->json([
                'message' => 'Phase deleted successfully',
                'data'=> $projectSheetDocument
            ],200);
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }

}
