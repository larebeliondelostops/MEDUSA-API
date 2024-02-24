<?php

namespace App\Http\Controllers\Viper;
use App\DTOs\Viper\Deliverable\DeliverableDetailFolderDTO;
use App\DTOs\Viper\Deliverable\DeliverableRequestDTO;
use App\Http\Request\Viper\DeliverableRequest;
use App\Interfaces\Viper\DeliverableInterface;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DeliverableController extends BaseController
{
    private DeliverableInterface $deliverableInterface;
    public function __construct(DeliverableInterface $deliverableInterface)
    {
        parent::__construct();
        $this->deliverableInterface = $deliverableInterface;
    }

    public function store(DeliverableRequest $request)
    {
        try
        {
            $data = $request->validated();
            $result = $this->deliverableInterface->createNewDeliverable(
                new DeliverableRequestDTO($data)
            );
            return response()->json([
                'data' => $result
            ], Response::HTTP_CREATED);
        }
        catch(Exception $exception)
        {
            return $this->handleException($exception);
        }
    }

    public function multipleStore(DeliverableRequest $request)
    {
        try
        {
            $deliverables = $request->validated()['deliverables']; // obtiene los deliverables validados
            $result = $this->deliverableInterface->createMultipleDeliverables($deliverables);
            return response()->json([
                'data' => $result
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
                "data" => $this->deliverableInterface->getAllDeliverables(),
            ], Response::HTTP_OK);
        }
        catch (Exception $exception)
        {
            return $this->handleException($exception);
        }
    }

    public function show(Request $request, int $scopeId)
    {
        try
        {
            return response()->json([
                "data" => $this->deliverableInterface->getDeliverablesByProductId($scopeId),
            ], Response::HTTP_OK);
        }
        catch(Exception $exception)
        {
            return $this->handleException($exception);
        }
    }

    public function update(DeliverableRequest $request, int $deliverableId)
    {
        try
        {
            $data = $request->validated();
            $result = $this->deliverableInterface->updateDeliverable(
                new DeliverableDetailFolderDTO($data),
                $deliverableId
            );
            return response()->json([
                'data' => $result,
            ], Response::HTTP_OK);
        }
        catch(Exception $exception)
        {
            return $this->handleException($exception);
        }
    }

    public function destroy(Request $request, int $deliverableId)
    {
        try
        {
            return response()->json([
                'message' => 'Entregable eliminado satisfactoriamente.',
                'data' => $this->deliverableInterface->deleteDeliverable($deliverableId),
            ], Response::HTTP_OK);
        }
        catch(Exception $exception)
        {
            return $this->handleException($exception);
        }
    }
}
