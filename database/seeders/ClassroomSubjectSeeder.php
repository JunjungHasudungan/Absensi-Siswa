<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ClassroomSubject;

class ClassroomSubjectSeeder extends Seeder
{

    public function run()
    {
        $classroom_subjects = [
            [
                'subject_id'        => 2,
                'classroom_id'      => 5,
                'day'               => 'Senin',
                'start_time'        => '08:00',
                'end_time'          => '09:00'
            ],
            [
                'subject_id'        => 3,
                'classroom_id'      => 5,
                'day'               => 'Senin',
                'start_time'        => '09:30',
                'end_time'          => '10:30'
            ]
        ];

        ClassroomSubject::insert($classroom_subjects);
    }
}
