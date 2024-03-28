<?php

namespace Database\Seeders\Villavicencio;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Indicator;

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

        $user1->name = 'Lesiones personales';
        $user1->description = '.';

        $user1->save();

        $user2 = new Indicator();

        $user2->name = 'Hurto a residencias';
        $user2->description = '.';

        $user2->save();

        $user3 = new Indicator();

        $user3->name = 'Hurto a comercios';
        $user3->description = '.';

        $user3->save();

        $user4 = new Indicator();

        $user4->name = 'Hurto a automotores';
        $user4->description = '.';

        $user4->save();

        $user5 = new Indicator();

        $user5->name = 'Hurto a motocicletas';
        $user5->description = '.';

        $user5->save();

        $user6 = new Indicator();

        $user6->name = 'Hurto a entidades financieras';
        $user6->description = '.';

        $user6->save();

        $user7 = new Indicator();

        $user7->name = 'Homicidio';
        $user7->description = '.';

        $user7->save();

        $user8 = new Indicator();

        $user8->name = 'Secuestro';
        $user8->description = '.';

        $user8->save();

        $user9 = new Indicator();

        $user9->name = 'Extorsión';
        $user9->description = '.';

        $user9->save();

        $user10 = new Indicator();

        $user10->name = 'Terrorismo';
        $user10->description = '.';

        $user10->save();

        $user11 = new Indicator();

        $user11->name = 'Caída de ocupante';
        $user11->description = '.';

        $user11->save();

        $user12 = new Indicator();

        $user12->name = 'Choque';
        $user12->description = '.';
        
        $user12->save();

        $user13 = new Indicator();

        $user13->name = 'Atropello';
        $user13->description = '.';

        $user13->save();

        $user14 = new Indicator();

        $user14->name = 'Volcamiento';
        $user14->description = '.';

        $user14->save();

        $user15 = new Indicator();

        $user15->name = 'Otro';
        $user15->description = '.';

        $user15->save();

    }
}
