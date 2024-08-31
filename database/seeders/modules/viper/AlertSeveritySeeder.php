<?php

namespace Database\Seeders\modules\viper;

use App\Models\AlertSeverity;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AlertSeveritySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('alert_severities')->insert([
            ['name' => 'Low'],
            ['name' => 'Medium'],
            ['name' => 'Critical']
        ]);
    }
}
