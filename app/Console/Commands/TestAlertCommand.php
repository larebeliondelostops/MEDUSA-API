<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\Modules\Viper\AlertService;
use Illuminate\Support\Facades\Log;
use Stancl\Tenancy\Tenancy;

class TestAlertCommand extends Command
{
    protected $signature = 'test:alert';
    protected $description = 'Test alert broadcasting in schedule context';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle(AlertService $alertService)
    {
        try {
            tenancy()->initialize('viper');
            // Llama al servicio que genera la alerta
            $alertService->createNewAlert(collect([
                "name" => "Recordatorio de cumplimiento requisitos iniciales",
                "type" => "SEGUIMIENTO TÉCNICO",
                "description" => "EL PROYECTO test20 FUE APROBADO EL DÍA 0001-01-01, POR LO TANTO, LA ENTIDAD TIENE 24638 MESES PARA CUMPLIR REQUISITOS DE EJECUCIÓN E INICIAR EL PROCESO DE CONTRATACIÓN CON EL ACTO ADMINISTRATIVO DE APERTURA.",
                "indicator_id" => null,
                "project_id" => "test20",
                "user_email" => "ignicion@ignicion.com",
                "severity_id" => 1
            ]));
            $this->info('Alert sent successfully');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            $this->error('Error sending alert: ' . $e->getMessage());
        }
    }
}
