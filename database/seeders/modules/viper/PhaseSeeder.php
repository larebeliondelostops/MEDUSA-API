<?php

namespace Database\Seeders\modules\viper;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;
use Carbon\Carbon;

class PhaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $phases = [
            ['name' => 'APROBACION DEL PROYECTO'],
            ['name' => 'APROBACION-FASE PRECONTRACTUAL'],
            ['name' => 'FASE CONTRACTUAL'],
            ['name' => 'FASE POSTCONTRACTUAL']
        ];

        foreach ($phases as $phase) {
            $now = Carbon::now();
            $phase['created_at'] = $now;

            DB::table('phases')->insert($phase);
        }
    }
}
