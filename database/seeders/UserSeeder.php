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
                'name'      => 'Hasudungan',
                'email'     => 'hasudungan@gmail.com',
                'password'  => bcrypt('password'),
                'role_id'   => 1
            ]
        ];

        User::insert($users);
    }
}
