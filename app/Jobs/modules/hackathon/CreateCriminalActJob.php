<?php

namespace App\Jobs;

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

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(
        private int $indicatorId,
        private string $address,
        private string $day,
        private string $month,
        private string $year,
        private string $description,
        private float $latitude,
        private float $longitude,
    )
    {}

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
                'year' => $this->year,
                'description' => $this->description,
                'latitude' => $this->latitude,
                'longitude' => $this->longitude,
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
