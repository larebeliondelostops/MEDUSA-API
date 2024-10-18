<?php

namespace App\Jobs\modules\hackathon;

use App\Models\Villavicencio\CriminalActs;
use App\Utils\IncidentGrid;
use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CreateCriminalActJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private int $indicatorId;
    private string $address;
    private string $day;
    private string $month;
    private string $description;
    private float $latitude;
    private float $longitude;
    private string $hour24;
    private string $crime;
    private string $week;
    private string $zone;
    private string $modality;

    public function __construct(
        int $indicatorId,
        string $address,
        string $day,
        string $month,
        string $description,
        float $latitude,
        float $longitude,
        string $hour24,
        string $crime,
        string $week,
        string $zone,
        string $modality
    ) {
        $this->indicatorId = $indicatorId;
        $this->address = $address;
        $this->day = $day;
        $this->month = $month;
        $this->description = $description;
        $this->latitude = $latitude;
        $this->longitude = $longitude;
        $this->hour24 = $hour24;
        $this->crime = $crime;
        $this->week = $week;
        $this->zone = $zone;
        $this->modality = $modality;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        try
        {
            DB::beginTransaction();
            $gridId = IncidentGrid::getGridIdByCoordinates($this->latitude, $this->longitude);
            CriminalActs::create([
                'indicator_id' => $this->indicatorId,
                'probabilistic_grid_id' => $gridId,
                'address' => $this->address,
                'day' => $this->day,
                'month' => $this->month,
                'description' => $this->description,
                'latitude' => $this->latitude,
                'longitude' => $this->longitude,
                'hour_24' => $this->hour24,
                'crime' => $this->crime,
                'week' => $this->week,
                'zone' => $this->zone,
                'modality' => $this->modality
            ]);
            DB::commit();
        }
        catch(Exception $exception)
        {
            DB::rollBack();
            Log::error($exception->getMessage() . ' - ' . $exception->getLine() . ' - ' . $exception->getFile());
        }
    }
}
