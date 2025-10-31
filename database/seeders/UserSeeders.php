<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //role customer
        User::Create ([
            'name' => 'customer',
            'email' => 'customer@gmail.com',
            'phone' => '1234567890',
            'role' => 'customer',
            'avatar' => 'path/to/avatar.jpg',
            'password' => bcrypt('123123123'),
        ]);

        //role teknisi
        User::Create ([
            'name' => 'teknisi',
            'email' => 'teknisi@gmail.com',
            'phone' => '1234567890',
            'role' => 'teknisi',
            'avatar' => 'path/to/avatar.jpg',
            'password' => bcrypt('123123123'),
        ]);
    }
}
