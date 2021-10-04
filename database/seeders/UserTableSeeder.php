<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'first_name' => 'francisco',
            'last_name' => 'perez',
            'email' => 'fperez@lenderhomepage.com',
            'password' => bcrypt('PAsZ1234#'),
        ]);

        User::create([
            'first_name' => 'admin',
            'last_name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('PAsZ1234#'),
        ]);
    }
}
