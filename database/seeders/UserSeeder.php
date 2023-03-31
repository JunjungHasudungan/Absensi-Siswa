<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'name'              => 'Hasudungan',
                'email'             => 'hasudungan@gmail.com',
                'password'          => bcrypt('password'),
                'role_id'           => 1, // admin
                'address'           => 'batam',
                'classroom_id'      => null,
            ],
            [
                'name'              => 'Rajiman',
                'email'             => 'rajiman@gmail.com',
                'password'          => bcrypt('password'),
                'role_id'           => 1, // admin
                'address'           => 'batam',
                'classroom_id'      => null,
            ],
            [
                'name'              => 'Sumitro',
                'email'             => 'sumitro@gmail.com',
                'password'          => bcrypt('password'),
                'role_id'           => 1, // admin
                'address'           => 'batam',
                'classroom_id'      => null,
            ],
            [
                'name'              => 'Satrio Kuncoro',
                'email'             => 'satrioKuncoro@gmail.com',
                'password'          => bcrypt('password'),
                'role_id'           => 2, // guru,
                'address'           => 'batam',
                'classroom_id'      => 1,
            ],
            [
                'name'              => 'Geraldy',
                'email'             => 'geraldi@gmail.com',
                'password'          => bcrypt('password'),
                'role_id'           => 3, // siswa
                'address'           => 'batam',
                'classroom_id'      => 1
            ],
            [
                'name'              => 'Tasya',
                'email'             => 'tasya@gmail.com',
                'password'          => bcrypt('password'),
                'role_id'           => 3, // siswa
                'address'           => 'batam',
                'classroom_id'      => 1
            ],
            [
                'name'              => 'Menti Hasibuan',
                'email'             => 'menti@gmail.com',
                'password'          => bcrypt('password'),
                'role_id'           => 2, // teacher, Wali Kelas IV
                'address'           => 'bekasi',
                'classroom_id'      => null
            ],
            [
                'name'              => 'Riris Suryani Simbolon',
                'email'             => 'riris@gmail.com',
                'password'          => bcrypt('password'),
                'role_id'           => 2, // teacher, Wali kelas VI
                'address'           => 'bekasi',
                'classroom_id'      => null
            ],
            [
                'name'              => 'Rebka Nababan',
                'email'             => 'rebka@gmail.com',
                'password'          => bcrypt('password'),
                'role_id'           => 2, // teacher, Wali Kelas II
                'address'           => 'bekasi',
                'classroom_id'      => null
            ],
            [
                'name'              => 'Wina Natalia Gea',
                'email'             => 'wina@gmail.com',
                'password'          => bcrypt('password'),
                'role_id'           => 2, // teacher, Wali Kelas III
                'address'           => 'bekasi',
                'classroom_id'      => null
            ],
            [
                'name'              => 'Lasma Malau',
                'email'             => 'lasma@gmail.com',
                'password'          => bcrypt('password'),
                'role_id'           => 2, // teacher
                'address'           => 'bekasi',
                'classroom_id'      => null
            ],
            [
                'name'              => 'Medi Warni Marbun',
                'email'             => 'medi@gmail.com',
                'password'          => bcrypt('password'),
                'role_id'           => 2, // teacher
                'address'           => 'bekasi',
                'classroom_id'      => null
            ],
            [
                'name'              => 'Rosda Nababan',
                'email'             => 'rosda@gmail.com',
                'password'          => bcrypt('password'),
                'role_id'           => 2, // teacher
                'address'           => 'bekasi',
                'classroom_id'      => null
            ],
            [
                'name'              => 'Merry Noveline Souisa',
                'email'             => 'merry@gmail.com',
                'password'          => bcrypt('password'),
                'role_id'           => 2, // teacher
                'address'           => 'bekasi',
                'classroom_id'      => null
            ],
            [
                'name'              => 'Juliet',
                'email'             => 'juliet@gmail.com',
                'password'          => bcrypt('password'),
                'role_id'           => 2, // teacher
                'address'           => 'bekasi',
                'classroom_id'      => null
            ],
            [
                'name'              => 'Vivi Ellen',
                'email'             => 'vivi@gmail.com',
                'password'          => bcrypt('password'),
                'role_id'           => 1, // TU
                'address'           => 'bekasi',
                'classroom_id'      => null
            ],
            [
                'name'              => 'Adam Grady Sinaga',
                'email'             => 'adam@gmail.com',
                'password'          => bcrypt('password'),
                'role_id'           => 3, // siswa
                'address'           => 'Jakarta',
                'classroom_id'      => 5
            ],
            [
                'name'              => 'Alvino Putra Dien',
                'email'             => 'alvino@gmail.com',
                'password'          => bcrypt('password'),
                'role_id'           => 3, // siswa
                'address'           => 'Bekasi',
                'classroom_id'      => 5
            ],
            [
                'name'              => 'Clairine Aurel Shanettne Sihotang',
                'email'             => 'clairine@gmail.com',
                'password'          => bcrypt('password'),
                'role_id'           => 3, // siswa
                'address'           => 'Jakarta',
                'classroom_id'      => 5
            ],
            [
                'name'              => 'Ignatius Maio Tyas Manuel',
                'email'             => 'ignatius@gmail.com',
                'password'          => bcrypt('password'),
                'role_id'           => 3, // siswa
                'address'           => 'Bekasi',
                'classroom_id'      => 5
            ],
            [
                'name'              => 'Keyko Joycelyn. P',
                'email'             => 'keyko@gmail.com',
                'password'          => bcrypt('password'),
                'role_id'           => 3, // siswa
                'address'           => 'Bekasi',
                'classroom_id'      => 5
            ],
            [
                'name'              => 'Mikha Permata Sari Marbun',
                'email'             => 'mikha@gmail.com',
                'password'          => bcrypt('password'),
                'role_id'           => 3, // siswa
                'address'           => 'Bekasi',
                'classroom_id'      => 5
            ],
            [
                'name'              => 'Naptali Yosia Trinita Lumban Raja',
                'email'             => 'naptali@gmail.com',
                'password'          => bcrypt('password'),
                'role_id'           => 3, // siswa
                'address'           => 'Jakarta',
                'classroom_id'      => 5
            ],
            [
                'name'              => 'Rehan Brama Putra',
                'email'             => 'rehan@gmail.com',
                'password'          => bcrypt('password'),
                'role_id'           => 3, // siswa
                'address'           => 'batam',
                'classroom_id'      => 5
            ],
            [
                'name'              => 'Ribka Sondang',
                'email'             => 'ribka@gmail.com',
                'password'          => bcrypt('password'),
                'role_id'           => 3, // siswa
                'address'           => 'Bekasi',
                'classroom_id'      => 5
            ],
            [
                'name'              => 'Winona Sabathini Hasibuan',
                'email'             => 'winona@gmail.com',
                'password'          => bcrypt('password'),
                'role_id'           => 3, // siswa
                'address'           => 'Bekasi',
                'classroom_id'      => 5
            ]
        ];

        User::insert($users);
    }
}
