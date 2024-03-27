<?php

namespace Database\Seeders\Neiva;

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
    }
}
