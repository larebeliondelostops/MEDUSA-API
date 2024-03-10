<?php

namespace App\Http\Controllers\Modules\Viper;

use App\DTOs\Viper\Location\LocationRequestDTO;
use App\Http\Request\Modules\Viper\LocationRequest;
use App\Interfaces\Modules\Viper\LocationInterface;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class LocationController extends BaseController
{
    private LocationInterface $locationInterface;
    public function __construct(LocationInterface $locationInterface)
    {
        parent::__construct();
        $this->locationInterface = $locationInterface;
    }

    public function store(LocationRequest $request)
    {
        try
        {
            $locationSaved = $this->locationInterface->createNewLocation(
                collect($request->validated())
            );
            return response()->json([
                $locationSaved->toArray()
            ], Response::HTTP_CREATED);
        }
        catch(Exception $exception)
        {
            return $this->handleException($exception);
        }
    }

    public function update(LocationRequest $request, int $locationId)
    {
        try
        {
            $data = $request->validated();
            $locationUpdated = $this->locationInterface->updateLocationById(
                collect($data),
                $locationId
            );
            return response()->json([
                $locationUpdated
            ], Response::HTTP_OK);
        }
        catch(Exception $exception)
        {
            return $this->handleException($exception);
        }
    }

    public function show(Request $request, int $locationId)
    {
        try
        {
            $locationGot = $this->locationInterface->getLocationById($locationId);
            return response()->json([
                $locationGot
            ], Response::HTTP_OK);
        }
        catch(Exception $exception)
        {
            return $this->handleException($exception);
        }
    }

    public function destroy(Request $request, int $locationId)
    {
        try
        {
            $locationDeleted = $this->locationInterface->deleteLocationById($locationId);
            return response()->json([
                $locationDeleted
            ], Response::HTTP_OK);
        }
        catch(Exception $exception)
        {
            return $this->handleException($exception);
        }
    }
}
