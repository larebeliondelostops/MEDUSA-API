<?php

namespace Database\Seeders\modules\viper;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = [
            [
                'name' => 'Pendiente',
                'description' => 'La actividad está planeada pero aún no ha comenzado',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'En progreso',
                'description' => 'La actividad está actualmente en desarrollo',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Completada',
                'description' => 'La actividad se ha finalizado exitosamente',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Suspendida',
                'description' => 'La actividad ha sido pausada temporalmente',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Cancelada',
                'description' => 'La actividad ha sido detenida y no se completará',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Revisando',
                'description' => 'La actividad ha sido completada y está en proceso de revisión o aprobación',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Aprobada',
                'description' => 'La actividad ha sido revisada y aprobada',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Rechazada',
                'description' => 'La actividad ha sido revisada y no ha sido aprobada',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Reprogramada',
                'description' => 'La actividad ha sido movida a una fecha diferente',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Atrasada',
                'description' => 'La actividad no se ha completado antes de la fecha límite',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('status_viper')->insert($statuses);
    }
}
