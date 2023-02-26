<?php

namespace Database\Seeders;

use App\Models\SubjectUser;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubjectUserSeeder extends Seeder
{
    public function run()
    {
        $subjectUser = [
            [
                'user_id'   => 6,
                'subject_id'    => 1
            ]
        ];

        SubjectUser::insert($subjectUser);
    }
}
