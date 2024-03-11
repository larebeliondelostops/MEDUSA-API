<?php

namespace App\Console\Commands;

use App\Models\AvlHistoryCoordinates;
use App\Models\Tenant;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Stancl\Tenancy\Concerns\TenantAwareCommand;

class MovementUnits extends Command
{
    use TenantAwareCommand;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'movement:units:avl';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    public function handle()
    {
        AvlHistoryCoordinates::orderBy('imei', 'desc')
        ->chunk(40, function ($historicals) {
            // Agrupa los registros del lote actual por 'imei'
            foreach ($historicals as $historical)
            {
                $posiciones = json_decode($historical->position, true);

                $firstElement = array_shift($posiciones);
                array_push($posiciones, $firstElement);

                $posiciones = json_encode($posiciones);

                DB::table('avl_history_coordinates')
                    ->where('imei', $historical->imei)
                    ->update(['position' => $posiciones]);
            }
        });
        /* $historicos = AvlHistoryCoordinates::all();

        foreach ($historicos as $historico)
        {

            $posiciones = json_decode($historico->position, true);

            $firstElement = array_shift($posiciones);
            array_push($posiciones, $firstElement);

            $historico->position = json_encode($posiciones);
            $historico->save();
        } */
    }

    protected function getTenants()
    {
        return Tenant::where('id', 'ditra')->get();
    }
}