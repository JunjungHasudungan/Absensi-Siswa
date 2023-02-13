<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ClassroomUser;

class ClassroomUserSeeder extends Seeder
{
    public function run()
    {
        $classoom_users = [
            [
                'classroom_id'  => 4,
                'user_id'       => 3,
            ],
            [
                'classroom_id'  => 4,
                'user_id'       => 5,
            ],
        ];

        ClassroomUser::insert($classoom_users);


    }
}
