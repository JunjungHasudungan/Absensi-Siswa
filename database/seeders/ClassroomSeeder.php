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
                'name'                  => '1',
                'code_classroom'        => '1a',
                'user_id'               => 11
            ],
            [
                'name'                  => '2',
                'code_classroom'        => '2a',
                'user_id'               => 9
            ],
            [
                'name'                  => '3',
                'code_classroom'        => '3a',
                'user_id'               => 10
            ],
            [
                'name'                  => '4',
                'code_classroom'        => '4a',
                'user_id'               => 7
            ],
            [
                'name'                  => '5',
                'code_classroom'        => '5a',
                'user_id'               => 12
            ],
            [
                'name'                  => '6',
                'code_classroom'        => '6a',
                'user_id'               => 8
            ],
        ];

        Classroom::insert($classrooms);
    }
}
