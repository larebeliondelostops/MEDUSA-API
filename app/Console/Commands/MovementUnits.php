<?php

namespace App\Console\Commands;

use App\Models\AvlHistoryCoordinates;
use App\Models\Tenant;
use Illuminate\Console\Command;
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
        $historicos = AvlHistoryCoordinates::all();

        foreach ($historicos as $historico)
        {

            $posiciones = json_decode($historico->position, true);

            $firstElement = array_shift($posiciones);
            array_push($posiciones, $firstElement);

            $historico->position = json_encode($posiciones);
            $historico->save();
        }
    }

    protected function getTenants()
    {
        return Tenant::where('id', 'ditra')->get();
    }
}