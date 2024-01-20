<?php

namespace App\Http\Controllers\Viper;
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
            $deliverableDTO = new DeliverableRequestDTO($data);
            $deliverableCreatedDTO = $this->deliverableInterface->createNewDeliverable($deliverableDTO, $data['project_id']);
            return response()->json([
                'message'  => 'Entregable creado satisfactoriamente.',
                'data' => $deliverableCreatedDTO,
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

    public function show(Request $request, int $productId)
    {
        try
        {
            return response()->json([
                "data" => $this->deliverableInterface->getDeliverablesByProductId($productId),
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
            return response()->json([
                'data' => $this->deliverableInterface->updateDeliverable($data['name'], $deliverableId),
            ], Response::HTTP_OK);
        }
        catch(Exception $exception)
        {
            return $this->handleException($exception);
        }
    }

    public function destroy(DeliverableRequest $request, int $deliverableId)
    {
        try
        {
            return response()->json([
                'message' => 'Entregable eliminado satisfactoriamente.',
                'data' => $this->deliverableInterface->deleteDeliverable($deliverableId),
            ]);
        }
        catch(Exception $exception)
        {
            return $this->handleException($exception);
        }
    }
}
