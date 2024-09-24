<?php

namespace App\Console\Commands;

use App\Interfaces\Modules\Viper\ActivityInterface;
use Illuminate\Console\Command;
use App\Interfaces\Modules\Viper\Alert\DeadlineActivityAlertInterface;
use Exception;
use Illuminate\Support\Facades\Log;
use Schema;
use Stancl\Tenancy\Tenancy;
use App\Models\Tenant;

class UpdateStateActivitiesByCurrentDate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'viper:update-state-activity-by-current-date';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update state activity to in progress by current date';

    protected $activityInterface;

    public function __construct(
        ActivityInterface $activityInterface
    )
    {
        parent::__construct();
        $this->activityInterface = $activityInterface;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $tenantsId = $this->getTenantIdWithActivitiesViperSchedule();
        foreach ($tenantsId as $tenantId)
        {
            tenancy()->initialize($tenantId);
            try {
                $this->activityInterface->updateStateActivityToInProgressByCurrentDate();
            } catch (Exception $e) {
                Log::channel('command_errors')->error('Error actualizando estado de actividades para tenant ' . $tenantId, ['error' => $e->getMessage()]);
            } finally {
                tenancy()->end(); 
            }
        }
        return Command::SUCCESS;
    }

    /**
     * Busca los inquilinos que tienen la tabla de actividades,
     * se asume que si tienen la tabla de actividades es porque tiene
     * habilitado el modulo de viper.
     *
     * @return array
     */
    protected function getTenantIdWithActivitiesViperSchedule() : array
    {
        $tenancy = app(Tenancy::class);
        $tenantsWithActivitiesViperSchedule = [];

        try
        {
            $tenants = Tenant::all();
            foreach($tenants as $tenant)
            {
                $tenancy->initialize($tenant);
                try {
                    if (Schema::hasTable('activities'))
                    {
                        $tenantsWithActivitiesViperSchedule[] = $tenant->id;
                    }
                } catch (Exception $e) {
                    Log::channel('command_errors')->error('Error checking activities table for tenant ' . $tenant->id, ['error' => $e->getMessage()]);
                } finally {
                    $tenancy->end();
                }
            }
        }
        catch (Exception $e)
        {
            Log::channel('command_errors')->error('Error in scheduled task:', ['error' => $e->getMessage()]);
        }

        return $tenantsWithActivitiesViperSchedule;
    }
}
