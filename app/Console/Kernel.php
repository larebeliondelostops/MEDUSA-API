<?php

namespace App\Console;

use App\Console\Schedule\modules\viper\ViperKernel;
use Exception;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Log;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [

        /* MultiSchemaMigrate::class,
        OneSchemaMigrate::class, */
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
        try
        {
            $viperKernel = app(ViperKernel::class);
            $viperKernel->schedule($schedule);
        }
        catch(Exception $exception)
        {
            Log::error($exception->getMessage() . ' - ' . $exception->getFile() . ' - ' . $exception->getLine());   
        }
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
