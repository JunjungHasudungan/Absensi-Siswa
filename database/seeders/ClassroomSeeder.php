<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Classroom;

class ClassroomSeeder extends Seeder
{
    public function run()
    {
        $classrooms = [
            [
                'name'                  => '1 A',
                'code_classroom'         => '1a',
                'user_id'               => 1
            ],
            [
                'name'                  => '1 B',
                'code_classroom'         => '1b',
                'user_id'               => 2
            ],
            [
                'name'                  => '2 A',
                'code_classroom'         => '2a',
                'user_id'               => 1
            ],
            [
                'name'                  => '2 B',
                'code_classroom'         => '2b',
                'user_id'               => 1
            ],
            [
                'name'                  => '4',
                'code_classroom'         => '4a',
                'user_id'               => 1
            ],
            [
                'name'                  => '5',
                'code_classroom'         => '5a',
                'user_id'               => 1
            ],
            [
                'name'                  => '6',
                'code_classroom'         => '6a',
                'user_id'               => 1
            ],
        ];

        Classroom::insert($classrooms);
    }
}
