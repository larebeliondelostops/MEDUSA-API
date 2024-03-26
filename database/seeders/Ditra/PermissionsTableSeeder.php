<?php

namespace Database\Seeders\Ditra;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        // Permisos de ejemplo
        $permissions = [
            ['name' => 'Incidentes', 'guard_name' => 'api'],
            ['name' => 'Peajes', 'guard_name' => 'api'],
            ['name' => 'Cámaras', 'guard_name' => 'api'],
            ['name' => 'Mapa de Calor', 'guard_name' => 'api'],
            ['name' => 'Tráfico', 'guard_name' => 'api'],
            ['name' => 'Unidades móviles', 'guard_name' => 'api'],
        ];

        // Insertar los permisos en la tabla
        foreach ($permissions as $permission) {
            Permission::create($permission);
        }
    }
}