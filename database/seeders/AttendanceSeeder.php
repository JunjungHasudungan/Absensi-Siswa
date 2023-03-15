<?php

namespace Database\Seeders;

use App\Models\Attendance;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AttendanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $attendances = [
            [
                'code'              => 'A',
                'description'       => 'Tanpa Keterangan',
            ],
            [
                'code'              => 'H',
                'description'       => 'Hadir',
            ],
            [
                'code'              => 'S1',
                'description'       => 'Sakit dengan Surat Keterangan Dokter',
            ],
            [
                'code'              => 'S2',
                'description'       => 'Sakit Tanpa Surat Keterangan Dokter',
            ],
            [
                'code'              => 'I',
                'description'       => 'Izin dengan surat izin',
            ],            [
                'code'              => 'D1',
                'description'       => 'Dispensasi acara didalam sekolah',
            ],
            [
                'code'              => 'D2',
                'description'       => 'Dispensasi acara diluar sekolah',
            ],
            [
                'code'              => 'H',
                'description'       => 'Hadir',
            ],


        ];

        Attendance::insert($attendances);
    }
}
