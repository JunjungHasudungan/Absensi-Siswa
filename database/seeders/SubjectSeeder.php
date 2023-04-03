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
                'user_id'           => 11,
                'classroom_id'      => 1
            ],
            [
                'code_subject'      => 'AGM 01',
                'name'              => 'Agama',
                'user_id'           => 11,
                'classroom_id'      => 1
            ],
            [
                'code_subject'      => 'PJOK 01',
                'name'              => 'Pendidikan Jasmani',
                'user_id'           => 48,
                'classroom_id'      => 1
            ],
            [
                'code_subject'      => 'Bindo 01',
                'name'              => 'Bahasa Indonesi',
                'user_id'           => 11,
                'classroom_id'      => 1
            ],
            [
                'code_subject'      => 'MTK 01',
                'name'              => 'Matematika',
                'user_id'           => 11,
                'classroom_id'      => 1
            ],
            [
                'code_subject'      => 'Bing 01',
                'name'              => 'Bahasa Inggris',
                'user_id'           => 11,
                'classroom_id'      => 1
            ],
            [
                'code_subject'      => 'SBdP 01',
                'name'              => 'Seni Budaya',
                'user_id'           => 11,
                'classroom_id'      => 1
            ],
            [
                'code_subject'      => 'Agm 02',
                'name'              => 'Agama',
                'user_id'           => 9,
                'classroom_id'      => 2
            ],
            [
                'code_subject'      => 'PKN 02',
                'name'              => 'Pendidikan Kewarganegara',
                'user_id'           => 9,
                'classroom_id'      => 2
            ],
            [
                'code_subject'      => 'Bindo 02',
                'name'              => 'Bahasa Indonesia',
                'user_id'           => 9,
                'classroom_id'      => 2
            ],
            [
                'code_subject'      => 'PJOK 02',
                'name'              => 'Pendidikan Jasmani',
                'user_id'           => 48,
                'classroom_id'      => 2
            ],
            [
                'code_subject'      => 'MTK 02',
                'name'              => 'Matematika',
                'user_id'           => 9,
                'classroom_id'      => 2
            ],
            [
                'code_subject'      => 'BIng 02',
                'name'              => 'Bahasa Inggris',
                'user_id'           => 9,
                'classroom_id'      => 2
            ],
            [
                'code_subject'      => 'SBdP 02',
                'name'              => 'Seni Budaya',
                'user_id'           => 9,
                'classroom_id'      => 2
            ],
            [
                'code_subject'      => 'MTK 03',
                'name'              => 'Matematika',
                'user_id'           => 10,
                'classroom_id'      => 3
            ],
            [
                'code_subject'      => 'PKN 03',
                'name'              => 'PKN',
                'user_id'           => 10,
                'classroom_id'      => 3
            ],
            [
                'code_subject'      => 'AGM 03',
                'name'              => 'Agama',
                'user_id'           => 10,
                'classroom_id'      => 3
            ],
            [
                'code_subject'      => 'Bindo 03',
                'name'              => 'Bahasa Indonesia',
                'user_id'           => 10,
                'classroom_id'      => 3
            ],
            [
                'code_subject'      => 'SBdP 03',
                'name'              => 'Seni Budaya',
                'user_id'           => 10,
                'classroom_id'      => 3
            ],
            [
                'code_subject'      => 'PJOK 03',
                'name'              => 'Pendidikan Jasmani',
                'user_id'           => 48,
                'classroom_id'      => 3
            ],
            [
                'code_subject'      => 'Bing 03',
                'name'              => 'Bahasa Inggris',
                'user_id'           => 10,
                'classroom_id'      => 3
            ],
            [
                'code_subject'      => 'Agm 04',
                'name'              => 'Agama',
                'user_id'           => 7,
                'classroom_id'      => 4
            ],
            [
                'code_subject'      => 'IPA 04',
                'name'              => 'Ilmu Pengetahuan Alam',
                'user_id'           => 7,
                'classroom_id'      => 4
            ],
            [
                'code_subject'      => 'PKN 04',
                'name'              => 'Pendidikan Kewarganegaraan',
                'user_id'           => 7,
                'classroom_id'      => 4
            ],
            [
                'code_subject'      => 'IPS 04',
                'name'              => 'Ilmu Pengetahuan Sosial',
                'user_id'           => 7,
                'classroom_id'      => 4
            ],
            [
                'code_subject'      => 'MTK 04',
                'name'              => 'Matematika',
                'user_id'           => 7,
                'classroom_id'      => 4
            ],
            [
                'code_subject'      => 'SBdP 04',
                'name'              => 'Seni Budaya',
                'user_id'           => 7,
                'classroom_id'      => 4
            ],
            [
                'code_subject'      => 'B.ing 04',
                'name'              => 'Bahasa Inggris',
                'user_id'           => 7,
                'classroom_id'      => 4
            ],
            [
                'code_subject'      => 'B.Indo 04',
                'name'              => 'Bahasa Indonesia',
                'user_id'           => 7,
                'classroom_id'      => 4
            ],
            [
                'code_subject'      => 'PJOK 04',
                'name'              => 'Pendidikan Jasmani',
                'user_id'           => 7,
                'classroom_id'      => 4
            ],
            [
                'code_subject'      => 'PKN 05',
                'name'              => 'PKN',
                'user_id'           => 12,
                'classroom_id'      => 5
            ],
            [
                'code_subject'      => 'B.Indo 05',
                'name'              => 'Bahasa Indonesia',
                'user_id'           => 12,
                'classroom_id'      => 5
            ],
            [
                'code_subject'      => 'IPA 05',
                'name'              => 'Ilmu Pengetahuan Alam',
                'user_id'           => 12,
                'classroom_id'      => 5
            ],
            [
                'code_subject'      => 'AGM 05',
                'name'              => 'Agama',
                'user_id'           => 12,
                'classroom_id'      => 5
            ],
            [
                'code_subject'      => 'MTK 05',
                'name'              => 'Matematika',
                'user_id'           => 12,
                'classroom_id'      => 5
            ],
            [
                'code_subject'      => 'SBdP 05',
                'name'              => 'Seni Budaya',
                'user_id'           => 12,
                'classroom_id'      => 5
            ],
            [
                'code_subject'      => 'PJOK 05',
                'name'              => 'Pendidikan Jasmani',
                'user_id'           => 48,
                'classroom_id'      => 5
            ],
            [
                'code_subject'      => 'IPS 05',
                'name'              => 'Ilmu Pengetahuan Sosial',
                'user_id'           => 12,
                'classroom_id'      => 5
            ],
            [
                'code_subject'      => 'B.Ing 05',
                'name'              => 'Bahasa Inggris',
                'user_id'           => 12,
                'classroom_id'      => 5
            ],
            [
                'code_subject'      => 'IPA 06',
                'name'              => 'Ilmu Pengetahuan Alam',
                'user_id'           => 8,
                'classroom_id'      => 6
            ],
            [
                'code_subject'      => 'B.Indo 06',
                'name'              => 'Bahasa Indonesia',
                'user_id'           => 8,
                'classroom_id'      => 6
            ],
            [
                'code_subject'      => 'AGM 06',
                'name'              => 'Agama',
                'user_id'           => 8,
                'classroom_id'      => 6
            ],
            [
                'code_subject'      => 'MTK 06',
                'name'              => 'Matematika',
                'user_id'           => 8,
                'classroom_id'      => 6
            ],
            [
                'code_subject'      => 'PKN 06',
                'name'              => 'PKN',
                'user_id'           => 8,
                'classroom_id'      => 6
            ],
            [
                'code_subject'      => 'IPS 06',
                'name'              => 'Ilmu Pengetahuan Sosial',
                'user_id'           => 8,
                'classroom_id'      => 6
            ],
            [
                'code_subject'      => 'PJOK 06',
                'name'              => 'Pendidikan Jasmani',
                'user_id'           => 48,
                'classroom_id'      => 6
            ],
            [
                'code_subject'      => 'B.Sun 06',
                'name'              => 'Bahasa Sunda',
                'user_id'           => 15,
                'classroom_id'      => 6
            ],
            [
                'code_subject'      => 'SBdP 06',
                'name'              => 'Seni Budaya',
                'user_id'           => 8,
                'classroom_id'      => 6
            ],
            [
                'code_subject'      => 'B.Ing 06',
                'name'              => 'Bahasa Inggris',
                'user_id'           => 8,
                'classroom_id'      => 6
            ],
        ];

        Subject::insert($subjects);
    }
}
