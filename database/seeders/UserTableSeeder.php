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
            'first_name' => 'user',
            'last_name' => 'user',
            'email' => 'user@gmail.com',
            'password' => bcrypt('PAsZ1234#'),
        ]);
    }
}
