<?php

namespace Database\Seeders\Modules\Viper;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserForTestingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'id' => 1,
                'name' => 'user test',
                'email'=> 'ignicion@ignicion.com',
                'phone_number' => null,
                'address' => null,
                'avatar' => null,
                'email_verified_at' => null,
                'password' => '$2y$10$boyPjOUCiJvSHp/c0c7JUeJFeRVx6qDvPF0I5dO8Bh9vnY2Ng7uz2', // 123456789
                'remember_token' => null,
                'created_at' => null,
                'updated_at' => null,
            ],
        ]);

        DB::table('roles')->insert([
            [
                'id' => 1,
                'name' => 'ApoyoAdmon',
                'guard_name' => 'ApoyoAdmon',
                'created_at' => null,
                'updated_at' => null,
            ],
        ]);

        DB::table('permissions')->insert([
            [
                'id' => 1,
                'name' => 'menu-Viper',
                'guard_name' => 'menu-Viper',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'id' => 2,
                'name' => 'commandbar-Proyectos',
                'guard_name' => 'commandbar-Proyectos',
                'created_at' => null,
                'updated_at' => null,
            ],
        ]);

        DB::table('role_has_permissions')->insert([
            [
                'permission_id' => 1,
                'role_id'=> 1,
            ],
            [
                'permission_id' => 2,
                'role_id'=> 1,
            ],
        ]);

        DB::table('model_has_roles')->insert([
            [
                'role_id' => 1,
                'model_type' => 'App\Models\User',
                'model_id' => 1,
            ],
        ]);
    }
}
