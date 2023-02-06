<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\BrandMotor;

class BrandMotorSeeder extends Seeder
{
    public function run()
    {
        $brand_motor  = [
            [
                'name'  => 'Honda'
            ],
            [
                'name'  => 'Yamaha'
            ],
            [
                'name'  => 'Suzuki'
            ]
        ];

        BrandMotor::insert($brand_motor);
    }
}
