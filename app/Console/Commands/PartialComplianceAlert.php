<?php

namespace App\Console\Commands;

use App\Interfaces\Modules\Viper\Alert\PartialComplianceAlertInterface;
use Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Schema;
use Stancl\Tenancy\Tenancy;
use App\Models\Tenant;

class PartialComplianceAlert extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'viper:partial-compliance-alert';
    protected PartialComplianceAlertInterface $partialComplianceAlertInterface;

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    public function __construct(
        PartialComplianceAlertInterface $partialComplianceAlertInterface
    ){
        parent::__construct();
        $this->partialComplianceAlertInterface = $partialComplianceAlertInterface;
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
                    $this->partialComplianceAlertInterface->execute();
                } catch (Exception $exception) {
                    Log::channel('command_errors')->error($exception->getMessage() . ' - ' . $exception->getFile() . ' - ' . $exception->getLine());
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
                    Log::error('Error checking activities table for tenant ' . $tenant->id, ['error' => $e->getMessage()]);
                } finally {
                    $tenancy->end();
                }
            }
        }
        catch (Exception $e)
        {
            Log::error('Error in scheduled task:', ['error' => $e->getMessage()]);
        }

        return $tenantsWithActivitiesViperSchedule;
    }
}
