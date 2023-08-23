<?php

namespace Database\Seeders\public_seeders;

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
        $tenant1->domain = 'local';
        $tenant1->schema = 'public';

        $tenant1->save();
    }
}
