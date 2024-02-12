<?php

namespace Database\Seeders\Ditra;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Ditra\Indicator;

class IndicatorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user1 = new Indicator();

        $user1->name = 'N/A';
        $user1->description = '.';

        $user1->save();

        $user2 = new Indicator();

        $user2->name = 'CHOQUE';
        $user2->description = '.';

        $user2->save();

        $user3 = new Indicator();

        $user3->name = 'CHOQUE CON OBJETO FIJO';
        $user3->description = '.';

        $user3->save();

        $user4 = new Indicator();

        $user4->name = 'VOLCAMIENTO LATERAL';
        $user4->description = '.';

        $user4->save();
    }
}
