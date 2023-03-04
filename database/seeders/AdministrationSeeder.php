<?php

namespace Database\Seeders;

use App\Models\Administration;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdministrationSeeder extends Seeder
{
    public function run()
    {
        $administrations = [
        [
                'title'                 => 'Cara Memasak Nasi',
                'method_learning'       => 1,
                'status'                => 0,
                'completeness'          => 0,
                'classroom_id'          => 1,
                'subject_id'            => 1,
                'user_id'               => 4,
        ],
    ];

        Administration::insert($administrations);
    }
}
