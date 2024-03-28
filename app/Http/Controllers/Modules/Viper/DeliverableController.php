<?php

namespace App\Http\Controllers\Modules\Viper;
use App\Http\Request\Modules\Viper\DeliverableRequest;
use App\Interfaces\Modules\Viper\Deliverable\DeliverableInterface;

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
            $result = $this->deliverableInterface->createNewDeliverable(
                collect($request->validated())
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
            $result = $this->deliverableInterface->updateDeliverable(
                collect($request->validated()),
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
