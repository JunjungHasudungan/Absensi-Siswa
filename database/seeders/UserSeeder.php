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
                'name'              => 'Adniel Abia Paulus',
                'email'             => 'adniel@gmail.com',
                'password'          => bcrypt('password'),
                'role_id'           => 3, // siswa
                'address'           => 'Bekasi',
                'classroom_id'      => 5
            ],
            [
                'name'              => 'Eira Gladys Ramoti',
                'email'             => 'eira@gmail.com',
                'password'          => bcrypt('password'),
                'role_id'           => 3, // siswa
                'address'           => 'Bekasi',
                'classroom_id'      => 5
            ],
            [
                'name'              => 'Franky Lionel Pratama',
                'email'             => 'franky@gmail.com',
                'password'          => bcrypt('password'),
                'role_id'           => 3, // siswa
                'address'           => 'Bekasi',
                'classroom_id'      => 5
            ],
            [
                'name'              => 'Jeslin Kristabel',
                'email'             => 'jeslin@gmail.com',
                'password'          => bcrypt('password'),
                'role_id'           => 3, // siswa
                'address'           => 'Bekasi',
                'classroom_id'      => 5
            ],
            [
                'name'              => 'Johanes Lumban',
                'email'             => 'johanes@gmail.com',
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
                'classroom_id'      => 4
            ],
            [
                'name'              => 'Keyko Joycelyn. P',
                'email'             => 'keyko@gmail.com',
                'password'          => bcrypt('password'),
                'role_id'           => 3, // siswa
                'address'           => 'Bekasi',
                'classroom_id'      => 4
            ],
            [
                'name'              => 'Abelia  Grace Maira',
                'email'             => 'abelia@gmail.com',
                'password'          => bcrypt('password'),
                'role_id'           => 3, // siswa
                'address'           => 'Jakarta',
                'classroom_id'      => 3
            ],
            [
                'name'              => 'Alicia Gytha Silalahi',
                'email'             => 'alicia@gmail.com',
                'password'          => bcrypt('password'),
                'role_id'           => 3, // siswa
                'address'           => 'Bekasi',
                'classroom_id'      => 3
            ],
            [
                'name'              => 'Asael March Oravalla',
                'email'             => 'asael@gmail.com',
                'password'          => bcrypt('password'),
                'role_id'           => 3, // siswa
                'address'           => 'Bekasi',
                'classroom_id'      => 3
            ],
            [
                'name'              => 'Breanna Kaitlyn',
                'email'             => 'breanna@gmail.com',
                'password'          => bcrypt('password'),
                'role_id'           => 3, // siswa
                'address'           => 'Bekasi',
                'classroom_id'      => 3
            ],
            [
                'name'              => 'George Chaleb',
                'email'             => 'george@gmail.com',
                'password'          => bcrypt('password'),
                'role_id'           => 3, // siswa
                'address'           => 'Jakarta',
                'classroom_id'      => 3
            ],
            [
                'name'              => 'Adam Grady Sinaga',
                'email'             => 'adam@gmail.com',
                'password'          => bcrypt('password'),
                'role_id'           => 3, // siswa
                'address'           => 'Bekasi',
                'classroom_id'      => 4
            ],
            [
                'name'              => 'Clairine Aurel',
                'email'             => 'clarine@gmail.com',
                'password'          => bcrypt('password'),
                'role_id'           => 3, // siswa
                'address'           => 'Bekasi',
                'classroom_id'      => 4
            ],
            [
                'name'              => 'Ignatius Maio Tyas',
                'email'             => 'ignatius@gmail.com',
                'password'          => bcrypt('password'),
                'role_id'           => 3, // siswa
                'address'           => 'Bekasi',
                'classroom_id'      => 4
            ],
            [
                'name'              => 'Mikha Permata',
                'email'             => 'mikha@gmail.com',
                'password'          => bcrypt('password'),
                'role_id'           => 3, // siswa
                'address'           => 'Bekasi',
                'classroom_id'      => 4
            ],
            [
                'name'              => 'Gabrielle Emilian',
                'email'             => 'gabrielle@gmail.com',
                'password'          => bcrypt('password'),
                'role_id'           => 3, // siswa
                'address'           => 'Bekasi',
                'classroom_id'      => 1
            ],
            [
                'name'              => 'Emmanuella Bellavania',
                'email'             => 'emmanuella@gmail.com',
                'password'          => bcrypt('password'),
                'role_id'           => 3, // siswa
                'address'           => 'Bekasi',
                'classroom_id'      => 1
            ],
            [
                'name'              => 'Joe Andrew Malau',
                'email'             => 'joe@gmail.com',
                'password'          => bcrypt('password'),
                'role_id'           => 3, // siswa
                'address'           => 'Bekasi',
                'classroom_id'      => 1
            ],
            [
                'name'              => 'Kanza Vionetta Yaviera',
                'email'             => 'kanza@gmail.com',
                'password'          => bcrypt('password'),
                'role_id'           => 3, // siswa
                'address'           => 'Bekasi',
                'classroom_id'      => 1
            ],
            [
                'name'              => 'Rhafael Aurello Siregar',
                'email'             => 'rhafael@gmail.com',
                'password'          => bcrypt('password'),
                'role_id'           => 3, // siswa
                'address'           => 'Bekasi',
                'classroom_id'      => 1
            ],
            [
                'name'              => 'Aldrich Nataguel',
                'email'             => 'aldrich@gmail.com',
                'password'          => bcrypt('password'),
                'role_id'           => 3, // siswa
                'address'           => 'Bekasi',
                'classroom_id'      => 2
            ],
            [
                'name'              => 'Aurelia Ivana',
                'email'             => 'aurelia@gmail.com',
                'password'          => bcrypt('password'),
                'role_id'           => 3, // siswa
                'address'           => 'Bekasi',
                'classroom_id'      => 2
            ],
            [
                'name'              => 'Cristella Tania',
                'email'             => 'crustella@gmail.com',
                'password'          => bcrypt('password'),
                'role_id'           => 3, // siswa
                'address'           => 'Bekasi',
                'classroom_id'      => 2
            ],
            [
                'name'              => 'Daniel Mahadi Sinaga',
                'email'             => 'daniel@gmail.com',
                'password'          => bcrypt('password'),
                'role_id'           => 3, // siswa
                'address'           => 'Bekasi',
                'classroom_id'      => 2
            ],
            [
                'name'              => 'Graeyciano Immanuel',
                'email'             => 'graeyciano@gmail.com',
                'password'          => bcrypt('password'),
                'role_id'           => 3, // siswa
                'address'           => 'Bekasi',
                'classroom_id'      => 2
            ],
            [
                'name'              => 'Emily Ernatha Uli Sirait',
                'email'             => 'emily@gmail.com',
                'password'          => bcrypt('password'),
                'role_id'           => 3, // siswa
                'address'           => 'Bekasi',
                'classroom_id'      => 6
            ],
            [
                'name'              => 'Alika Maddy Sinaga',
                'email'             => 'alika@gmail.com',
                'password'          => bcrypt('password'),
                'role_id'           => 3, // siswa
                'address'           => 'Bekasi',
                'classroom_id'      => 6
            ],
            [
                'name'              => 'Alvina Natama Sillahi',
                'email'             => 'alvina@gmail.com',
                'password'          => bcrypt('password'),
                'role_id'           => 3, // siswa
                'address'           => 'Bekasi',
                'classroom_id'      => 6
            ],
            [
                'name'              => 'Jessica Amanda Simbolon',
                'email'             => 'jesica@gmail.com',
                'password'          => bcrypt('password'),
                'role_id'           => 3, // siswa
                'address'           => 'Bekasi',
                'classroom_id'      => 6
            ],
            [
                'name'              => 'Jonathan Gustitomo',
                'email'             => 'jonathan@gmail.com',
                'password'          => bcrypt('password'),
                'role_id'           => 3, // siswa
                'address'           => 'Bekasi',
                'classroom_id'      => 6
            ],
            [
                'name'              => 'Sabat',
                'email'             => 'sabat@gmail.com',
                'password'          => bcrypt('password'),
                'role_id'           => 3, // siswa
                'address'           => 'Bekasi',
                'classroom_id'      => null
            ],
        ];

        User::insert($users);
    }
}
