<?php

namespace Database\Seeders\Modules\Viper;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

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

        $idUser = User::where('email','ignicion@ignicion.com')->first()->id;

        DB::table('roles')->insert([
            [
                'name' => 'ApoyoAdmon',
                'guard_name' => 'ApoyoAdmon',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'name' => 'Interventoría',
                'guard_name' => 'Interventoría',
                'created_at' => null,
                'updated_at' => null,
            ],
        ]);

        $roles = [];
        $roles['ApoyoAdmon'] = Role::where('name','ApoyoAdmon')->first()->id;
        $roles['Interventoría'] = Role::where('name','Interventoría')->first()->id;

        DB::table('permissions')->insert([
            [
                'name' => 'menu-Mapa',
                'guard_name' => 'menu-Mapa',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'name' => 'menu-Viper',
                'guard_name' => 'menu-Viper',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'name' => 'commandbar-Proyectos',
                'guard_name' => 'commandbar-Proyectos',
                'created_at' => null,
                'updated_at' => null,
            ],
        ]);

        $permission = [];
        $permission['menu-Mapa'] = Permission::where('name', 'menu-Mapa')->first()->id;
        $permission['menu-Viper'] = Permission::where('name', 'menu-Viper')->first()->id;
        $permission['commandbar-Proyectos'] = Permission::where('name', 'commandbar-Proyectos')->first()->id;

        DB::table('role_has_permissions')->insert([
            [
                'permission_id' => $permission['menu-Mapa'],
                'role_id'=> $roles['ApoyoAdmon'],
            ],
            [
                'permission_id' => $permission['menu-Viper'],
                'role_id'=> $roles['ApoyoAdmon'],
            ],
            
            [
                'permission_id' => $permission['commandbar-Proyectos'],
                'role_id'=> $roles['ApoyoAdmon'],
            ],
            [
                'permission_id' => $permission['menu-Mapa'],
                'role_id'=> $roles['Interventoría'],
            ],
            [
                'permission_id' => $permission['menu-Viper'],
                'role_id'=> $roles['Interventoría'],
            ],
            
            [
                'permission_id' => $permission['commandbar-Proyectos'],
                'role_id'=> $roles['Interventoría'],
            ],
        ]);

        DB::table('model_has_roles')->insert([
            [
                'role_id' => $roles['ApoyoAdmon'],
                'model_type' => 'App\Models\User',
                'model_id' => $idUser,
            ],
            [
                'role_id' => $roles['Interventoría'],
                'model_type' => 'App\Models\User',
                'model_id' => $idUser,
            ],
        ]);
    }
}
