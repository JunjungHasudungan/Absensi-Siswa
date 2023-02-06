<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Motorcycle;

class Motorcycleseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $motorcycles = [
            [
                'name'                  => 'Vario 125',
                'production_year'       => '2020',
                'brand_motor_id'        => 1,
                'type'                  => 0
            ],
            [
                'name'                  => 'Vario 150',
                'production_year'       => '2020',
                'brand_motor_id'        => 1,
                'type'                  => 0
            ],
                        [
                'name'                  => 'Vario 125',
                'production_year'       => '2020',
                'brand_motor_id'        => 1,
                'type'                  => 0
            ],
        ];

        Motorcycle::insert($motorcycles);
    }
}
