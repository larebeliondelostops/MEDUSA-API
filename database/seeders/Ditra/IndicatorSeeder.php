<?php

namespace Database\Seeders\Ditra;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Ditra\Indicator;

class IndicatorSeeder extends Seeder
{
    //TIPO{ATROPELLO, CAIDA DE OCUPANTE, CHOQUE, CHOQUE CON OBJETO FIJO, N/A, OTRO, SALIDA DE CALZADA, VOLCAMIENTO, VOLCAMIENTO LATERAL}
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

        $user5 = new Indicator();

        $user5->name = 'VOLCAMIENTO';
        $user5->description = '.';
        $user5->save();

        $user6 = new Indicator();

        $user6->name = 'SALIDA DE CALZADA';
        $user6->description = '.';
        $user6->save();

        $user7 = new Indicator();

        $user7->name = 'ATROPELLO';
        $user7->description = '.';
        $user7->save();

        $user8 = new Indicator();

        $user8->name = 'CAIDA DE OCUPANTE';
        $user8->description = '.';
        $user8->save();

        $user9 = new Indicator();

        $user9->name = 'OTRO';
        $user9->description = '.';
        $user9->save();
    }
}
