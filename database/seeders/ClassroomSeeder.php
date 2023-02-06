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
                'name'      => '1'
            ],
            [
                'name'      => '2'
            ],
            [
                'name'      => '3'
            ],
            [
                'name'      => '4'
            ],
            [
                'name'      => '5'
            ],
            [
                'name'      => '6'
            ],
        ];

        Classroom::insert($classrooms);
    }
}
