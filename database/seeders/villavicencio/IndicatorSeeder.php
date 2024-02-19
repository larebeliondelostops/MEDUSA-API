<?php

namespace Database\Seeders\villavicencio;

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

        $user1->Name = 'Lesiones personales';
        $user1->Description = '.';

        $user1->save();

        $user2 = new Indicator();

        $user2->Name = 'Hurto a residencias';
        $user2->Description = '.';

        $user2->save();

        $user3 = new Indicator();

        $user3->Name = 'Hurto a comercios';
        $user3->Description = '.';

        $user3->save();

        $user4 = new Indicator();

        $user4->Name = 'Hurto a automotores';
        $user4->Description = '.';

        $user4->save();

        $user5 = new Indicator();

        $user5->Name = 'Hurto a motocicletas';
        $user5->Description = '.';

        $user5->save();

        $user6 = new Indicator();

        $user6->Name = 'Hurto a entidades financieras';
        $user6->Description = '.';

        $user6->save();

        $user7 = new Indicator();

        $user7->Name = 'Homicidio';
        $user7->Description = '.';

        $user7->save();

        $user8 = new Indicator();

        $user8->Name = 'Secuestro';
        $user8->Description = '.';

        $user8->save();

        $user9 = new Indicator();

        $user9->Name = 'Extorsión';
        $user9->Description = '.';

        $user9->save();

        $user10 = new Indicator();

        $user10->Name = 'Terrorismo';
        $user10->Description = '.';

        $user10->save();
    }
}
