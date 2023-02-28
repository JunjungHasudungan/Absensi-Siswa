<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Subject;

class SubjectSeeder extends Seeder
{
    public function run()
    {
        $subjects = [
            [
                'code_subject'      => 'PKN 01',
                'name'              => 'PKN',
                'user_id'           => 4,
            ]
        ];

        Subject::insert($subjects);
    }
}
