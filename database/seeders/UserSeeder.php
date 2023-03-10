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
            ]
        ];

        User::insert($users);
    }
}
