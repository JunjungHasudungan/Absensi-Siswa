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
                'name'                => 'Dua',
                'user_id'             => 1
            ],
            [
                'name'                => 'Dua',
                'user_id'             => 2
            ],
            [
                'name'                => 'Dua',
                'user_id'             => 1
            ],
            [
                'name'                => 'Dua',
                'user_id'             => 1
            ],
            [
                'name'                => 'Dua',
                'user_id'             => 1
            ],
            [
                'name'                => 'Dua',
                'user_id'             => 1
            ],
        ];

        Classroom::insert($classrooms);
    }
}
