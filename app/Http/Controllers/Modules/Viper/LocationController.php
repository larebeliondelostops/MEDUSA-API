<?php

namespace App\Http\Controllers\Modules\Viper;

use App\DTOs\Viper\Location\LocationRequestDTO;
use App\Http\Request\Viper\LocationRequest;
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
            $data = $request->validated();
            $locationSaved = $this->locationInterface->createNewLocation(
                new LocationRequestDTO($data)
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
                new LocationRequestDTO($data),
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
