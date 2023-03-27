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
                'classroom_id'      => 1
            ],
            [
                'code_subject'      => 'Agama04',
                'name'              => 'Pendidikan Agama dan Budi Pekerti',
                'user_id'           => 4,
                'classroom_id'      => 5
            ],
            [
                'code_subject'      => 'PKN 04',
                'name'              => 'PKN',
                'user_id'           => 4,
                'classroom_id'      => 5
            ],
            [
                'code_subject'      => 'Bind04',
                'name'              => 'Bahasa Indonesia',
                'user_id'           => 4,
                'classroom_id'      => 5
            ],
            [
                'code_subject'      => 'MTK04',
                'name'              => 'Matematika',
                'user_id'           => 4,
                'classroom_id'      => 5
            ],
            [
                'code_subject'      => 'IPA04',
                'name'              => 'Ilmu Pengetahuan Alam',
                'user_id'           => 4,
                'classroom_id'      => 5
            ],
            [
                'code_subject'      => 'IPS04',
                'name'              => 'Ilmu Pengetahuan Sosial',
                'user_id'           => 4,
                'classroom_id'      => 5
            ],
            [
                'code_subject'      => 'SBP04',
                'name'              => 'Seni Budaya dan Prakarya',
                'user_id'           => 4,
                'classroom_id'      => 5
            ],
            [
                'code_subject'      => 'PJOK04',
                'name'              => 'Pendidikan Jasmani Olahraga dan Kesehatan',
                'user_id'           => 4,
                'classroom_id'      => 5
            ],
            [
                'code_subject'      => 'Bing04',
                'name'              => 'Bahasa Inggris',
                'user_id'           => 4,
                'classroom_id'      => 5
            ],
        ];

        Subject::insert($subjects);
    }
}
