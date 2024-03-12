<?php

namespace App\Console\Commands;

use App\Models\Tenant;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Stancl\Tenancy\Concerns\TenantAwareCommand;

class MovementUnitsVillavicencio extends Command
{
    use TenantAwareCommand;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'movement:units:villavicencio';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    public function handle()
    {
        $historicals = DB::table('units_history_coordinates')->orderBy('id', 'desc')->get();

        foreach ($historicals as $historical)
        {
            $posiciones = json_decode($historical->position, true);

            $firstElement = array_shift($posiciones);
            array_push($posiciones, $firstElement);

            $posiciones = json_encode($posiciones);

            DB::table('units_history_coordinates')
                ->where('id', $historical->id)
                ->update(['position' => $posiciones]);
        }
    }

    protected function getTenants()
    {
        return Tenant::where('id', 'villavicencio')->get();
    }
}