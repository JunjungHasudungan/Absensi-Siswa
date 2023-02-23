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
                'student_id'    => 5,
                'subject_id'    => 1,
            ]
        ];

        Attendance::insert($attendances);
    }
}
