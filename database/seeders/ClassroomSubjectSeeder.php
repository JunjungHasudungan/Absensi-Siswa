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
                'subject_id'        => 1,
                'classroom_id'      => 1,
                // 'weekday'           => 1,
            ]
        ];

        ClassroomSubject::insert($classroom_subjects);
    }
}
