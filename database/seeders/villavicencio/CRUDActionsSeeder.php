<?php

namespace Database\Seeders\villavicencio;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CRUDActionsSeeder extends Seeder
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
        DB::table('menu')->insert([
            [
                'id' => 1,
                'name' => 'CREAR',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'name' => 'ACTUALIZAR',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'name' => 'BORRAR',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
