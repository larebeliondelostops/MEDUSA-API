<?php

namespace Database\Seeders\Viper;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MeasurementUnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * Marcadores para villavicencio
         */
        DB::table('measurement_units')->insert([
            [
                'name' => '# de Suervisiones',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => '$',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => '%',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Día',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Global',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Hora',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Ha',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Hp',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'INTV Interventoría',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Jornal',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'KVA',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'KW',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Kg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Km',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Km2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Operación',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Pre-Inversión',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Ton',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Año',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'l',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'lb',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'm',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'm2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'm3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'mes',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'min',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'sem',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'und',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
