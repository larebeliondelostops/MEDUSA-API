<?php

namespace App\Http\Controllers\Modules\hackathon;
use App\Http\Request\Modules\hackathon\StoreIncidentRequest;
use App\Http\Request\Modules\hackathon\UpdateIncidentRequest;
use App\Interfaces\Modules\hackathon\IncidentInterface;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class IncidentController extends Controller
{
    protected IncidentInterface $incidentInterface;

    public function __construct(
        IncidentInterface $incidentInterface
    )
    {
        $this->incidentInterface = $incidentInterface;
    }

    public function index() : JsonResponse
    {
        try
        {
            $incidents = $this->incidentInterface->getAllIncidents();
            return response()->json($incidents, Response::HTTP_OK);
        }
        catch(Exception $exception)
        {
            Log::error($exception->getMessage() . ' - ' . $exception->getLine() . ' - ' . $exception->getFile());
            return response()->json(['error' => 'Internal Server Error'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function show(int $id) : JsonResponse
    {
        try
        {
            $incident = $this->incidentInterface->getIncidentById($id);
            return response()->json($incident, Response::HTTP_OK);
        }
        catch(Exception $exception)
        {
            Log::error($exception->getMessage() . ' - ' . $exception->getLine() . ' - ' . $exception->getFile());
            return response()->json(['error' => 'Internal Server Error'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function store(StoreIncidentRequest $request) : JsonResponse
    {
        try
        {
            $data = $request->validated();
            $incident = $this->incidentInterface->createIncident($data);
            return response()->json($incident, Response::HTTP_CREATED);
        }
        catch(Exception $exception)
        {
            Log::error($exception->getMessage() . ' - ' . $exception->getLine() . ' - ' . $exception->getFile());
            return response()->json(['error' => 'Internal Server Error'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function update(UpdateIncidentRequest $request, int $id) : JsonResponse
    {
        try
        {
            $data = $request->validated();
            $incident = $this->incidentInterface->updateIncident($data, $id);
            return response()->json($incident, Response::HTTP_OK);
        }
        catch(Exception $exception)
        {
            Log::error($exception->getMessage() . ' - ' . $exception->getLine() . ' - ' . $exception->getFile());
            return response()->json(['error' => 'Internal Server Error'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function destroy(int $id) : JsonResponse
    {
        try
        {
            $this->incidentInterface->deleteIncident($id);
            return response()->json(['message' => 'Incident deleted'], Response::HTTP_OK);
        }
        catch(Exception $exception)
        {
            Log::error($exception->getMessage() . ' - ' . $exception->getLine() . ' - ' . $exception->getFile());
            return response()->json(['error' => 'Internal Server Error'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}