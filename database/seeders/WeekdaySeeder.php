<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Weekday;

class WeekdaySeeder extends Seeder
{

    public function run()
    {
        $weekdays = [
            [
                'name'      => 'Senin'
            ],
            [
                'name'      => 'Selasa'
            ],
            [
                'name'      => 'Rabu'
            ],
            [
                'name'      => 'Kamis'
            ],
            [
                'name'      => 'Jumat'
            ],
        ];

        Weekday::insert($weekdays);
    }
}
