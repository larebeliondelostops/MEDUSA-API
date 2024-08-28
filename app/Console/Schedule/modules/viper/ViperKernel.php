<?php

namespace App\Console\Schedule\modules\viper;

use App\Console\Commands\DeadlineActivityAlert;
use App\Console\Commands\UpdateStateActivitiesByCurrentDate;
use Exception;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Log;
use LaravelLang\Publisher\Console\Update;

class ViperKernel extends ConsoleKernel
{
    public function __construct(
    )
    {
        parent::__construct(app(), app('Illuminate\Contracts\Events\Dispatcher'));
    }

    protected function schedule(Schedule $schedule)
    {
        try
        {
            $schedule->command(
                UpdateStateActivitiesByCurrentDate::class
            )->everyMinute();

            $schedule->command(
                DeadlineActivityAlert::class
            )->everyMinute();
        }
        catch(Exception $exception)
        {
            Log::error($exception->getMessage() . ' - ' . $exception->getFile() . ' - ' . $exception->getLine());
            throw $exception;
        }
    }
}
