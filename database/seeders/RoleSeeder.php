<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    public function run()
    {
        $roles = [
            [
                'name'  => 'admin'
            ],
            [
                'name'  => 'teacher'
            ],
            [
                'name'  => 'student'
            ]
        ];

        Role::insert($roles);
    }
}
