<?php

namespace Database\Seeders;

use App\Models\Note;
use Illuminate\Database\Seeder;

class NoteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        Note::factory()->count(3)->create(['user_id' => 1]);
        Note::factory()->count(3)->create(['user_id' => 2]);
        Note::factory()->count(7)->create();
    }
}
