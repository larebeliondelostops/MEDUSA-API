<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tenancy;

class TenancySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tenant1 = new Tenancy();

        $tenant1->name = 'local';
        $tenant1->domain = 'villavicencio';
        $tenant1->schema = 'public';

        $tenant1->save();

        $tenant1 = new Tenancy();

        $tenant1->name = 'local';
        $tenant1->domain = 'neiva';
        $tenant1->schema = 'public';

        $tenant1->save();
    }
}
