<?php

namespace App\Services\Modules\hackathon;
use App\Interfaces\Modules\hackathon\IncidentInterface;
use App\Jobs\modules\hackathon\CreateCriminalActJob;
use App\Models\Villavicencio\Incident;
use Exception;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Ramsey\Uuid\Uuid;
use Carbon\Carbon;

class IncidentService implements IncidentInterface
{
    public function getAllIncidents() : Collection
    {
        try
        {
            $incidents = Incident::all();
            return $incidents;
        }
        catch(Exception $exception)
        {
            Log::error($exception->getMessage() . ' - ' . $exception->getLine() . ' - ' . $exception->getFile());
            throw $exception;
        }
    }

    public function getIncidentById(int $id) : Collection 
    {
        try
        {
            $incidentFound = Incident::findOrFail($id);
            return $incidentFound;
        }   
        catch(Exception $exception)
        {
            Log::error($exception->getMessage() . ' - ' . $exception->getLine() . ' - ' . $exception->getFile());
            throw $exception;
        }
    }

    public function createIncident(array $data) : Collection 
    {
        try
        {   
            DB::beginTransaction();
            $imagePath = $data['image']->store('', 'public');
            $date = Carbon::createFromFormat('Y-m-d H:i:s', $data['date']);

            $incidentCreated = Incident::create([
                'uuid' => Uuid::uuid4()->toString(),
                'indicator_id' => $data['indicator'],
                'address' => $data['address'] ?? '',
                'description' => $data['description'] ?? '',
                'latitude' => $data['latitude'],
                'longitude' => $data['longitude'],
                'image' => $imagePath,
                'day' => $date->day,
                'month' => $date->month,
                'year' => $date->year,
                'reviewed' => false
            ]);

            CreateCriminalActJob::dispatch(
                $data['indicator'],
                $data['address'],
                $date->day,
                $date->month,
                $data['description'],
                $data['latitude'],
                $data['longitude'],
                $date->format('H'),
                $data['crime'],
                $date->weekOfYear,
                $data['zone'],
                $data['modality'],
                $data['date']
            );
            DB::commit();
            return collect($incidentCreated);
        }
        catch (Exception $exception)
        {
            DB::rollBack();
            Log::error($exception->getMessage() . ' - ' . $exception->getLine() . ' - ' . $exception->getFile());
            throw $exception;
        }
    }


    public function updateIncident($data, $id) : Collection 
    {
        try
        {
            $incidentFound = Incident::findOrFail($id);
            $incidentFound->updateOrFail($data);
            return collect($incidentFound);
        }
        catch (Exception $exception)
        {
            Log::error($exception->getMessage() . ' - ' . $exception->getLine() . ' - ' . $exception->getFile());
            throw $exception;
        }
    }

    public function deleteIncident(int $id) : Collection 
    {
        try
        {
            $incidentFound = Incident::findOrFail($id);
            $incidentFound->delete();
            return collect($incidentFound);
        }
        catch (Exception $exception)
        {
            Log::error($exception->getMessage() . ' - ' . $exception->getLine() . ' - ' . $exception->getFile());
            throw $exception;
        }
    }
}