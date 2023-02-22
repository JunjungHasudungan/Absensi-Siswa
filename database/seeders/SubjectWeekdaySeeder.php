<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SubjectWeekday;

class SubjectWeekdaySeeder extends Seeder
{
    public function run()
    {
        $subjectWeekdays = [
            [
                'subject_id'        => 1,
                'weekday_id'        => 1,
                'start_time'        => 1,
                'end_time'          => 2
            ],
        ];

        SubjectWeekday::insert($subjectWeekdays);


    }
}
