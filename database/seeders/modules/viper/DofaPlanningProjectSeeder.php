<?php

namespace Database\Seeders\modules\viper;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;
use Carbon\Carbon;

class DofaPlanningProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    }

    public function createDofaPlanningProjectForProject($projectId)
    {
        $items = [
            '1',
            '1.1',
            '1.2',
            '1.3',
            '1.4',
            '1.5',
            '2',
            '2.1',
            '2.2',
            '2.3',
            '2.4',
            '2.5',
            '2.6',
            '2.7',
            '3',
            '3.1',
            '3.1.1',
            '3.1.2',
            '3.1.3',
            '3.1.4',
            '3.1.5',
            '3.1.6',
            '3.1.7',
            '3.1.8',
            '3.1.9',
            '3.1.10',
            '3.2',
            '3.2.1',
            '3.2.2',
            '3.2.3',
            '3.2.4',
            '3.2.5',
            '3.2.6',
            '3.2.7',
            '3.2.8',
            '3.2.9',
            '3.2.10',
            '3.2.11',
            '3.2.12',
            '3.2.13',
            '3.2.14',
            '3.2.15',
        ];   

        foreach ($items as $item) {
            $now = Carbon::now();
            $dofaPlanning = [
                'dofa_planning_id' => DB::table('dofa_planning')->where('item', $item)->value('id'),
                'project_id' => $projectId,
                'created_at' => $now,
            ];
            DB::table('dofa_planning_project')->insert($dofaPlanning);
        }
    }
}
