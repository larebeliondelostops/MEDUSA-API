<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FieldsSeeder extends Seeder
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
        DB::connection('villavicencio')->table('fields')->insert([
            [
                'id' => 1,
                'name' => 'Nombre',
                'key' => 'name',
                'type' => 1,
                'required' => true,
                'schema' => 'text',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'name' => 'Email',
                'key' => 'email',
                'type' => 3,
                'required' => true,
                'schema' => 'email',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'name' => 'Rol',
                'key' => 'role',
                'type' => 4,
                'required' => true,
                'schema' => 'text',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'name' => 'Dirección',
                'key' => 'address',
                'type' => 1,
                'required' => true,
                'schema' => 'text',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 5,
                'name' => 'Teléfono',
                'key' => 'phone',
                'type' => 2,
                'required' => true,
                'schema' => 'phone',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 6,
                'name' => 'Posición',
                'key' => 'position',
                'type' => 6,
                'required' => true,
                'schema' => 'position',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 7,
                'name' => 'Potencial de mujeres',
                'key' => 'potencialWomen',
                'type' => 2,
                'required' => true,
                'schema' => 'number',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 8,
                'name' => 'Potencial de hombres',
                'key' => 'potencialMen',
                'type' => 2,
                'required' => true,
                'schema' => 'number',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 9,
                'name' => 'Total votos',
                'key' => 'totalVotes',
                'type' => 2,
                'required' => true,
                'schema' => 'number',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 10,
                'name' => 'Mesas',
                'key' => 'tables',
                'type' => 2,
                'required' => true,
                'schema' => 'number',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        /**
         * Marcadores para neiva
         */
        DB::connection('neiva')->table('fields')->insert([
            [
                'id' => 1,
                'name' => 'Nombre',
                'key' => 'name',
                'type' => 1,
                'required' => true,
                'schema' => 'text',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'name' => 'Email',
                'key' => 'email',
                'type' => 3,
                'required' => true,
                'schema' => 'email',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'name' => 'Rol',
                'key' => 'role',
                'type' => 4,
                'required' => true,
                'schema' => 'text',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'name' => 'Dirección',
                'key' => 'address',
                'type' => 1,
                'required' => true,
                'schema' => 'text',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 5,
                'name' => 'Teléfono',
                'key' => 'phone',
                'type' => 2,
                'required' => true,
                'schema' => 'phone',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 6,
                'name' => 'Posición',
                'key' => 'position',
                'type' => 6,
                'required' => true,
                'schema' => 'position',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 7,
                'name' => 'Potencial de mujeres',
                'key' => 'potencialWomen',
                'type' => 2,
                'required' => true,
                'schema' => 'number',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 8,
                'name' => 'Potencial de hombres',
                'key' => 'potencialMen',
                'type' => 2,
                'required' => true,
                'schema' => 'number',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 9,
                'name' => 'Total votos',
                'key' => 'totalVotes',
                'type' => 2,
                'required' => true,
                'schema' => 'number',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 10,
                'name' => 'Mesas',
                'key' => 'tables',
                'type' => 2,
                'required' => true,
                'schema' => 'number',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
