<?php

namespace Database\Seeders\modules\viper;

use Illuminate\Database\Seeder;

class ViperTestingSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            UserForTestingSeeder::class,
        ]);
    }
}
