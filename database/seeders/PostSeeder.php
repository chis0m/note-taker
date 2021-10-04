<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Post::firstOrCreate(
            ['slug' => Str::slug('My Journey As Developer, Wins and Challenges. I would love to share with you my road from day one')],
            [
                'user_id' => 1,
                'title' => 'My Journey As Developer, Wins and Challenges. I would love to share with you my road from day one',
                'description' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard".
                            'dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen'.
                            'book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially'.
                            'unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and'.
                            'more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
                'tags' => 'devops,linux,ubuntu,vue',
                'read_time' => '6',
            ]
        );
        Post::firstOrCreate(
            ['slug' => Str::slug('Devops Methodology for a Startup')],
            [
                'user_id' => 1,
                'title' => 'Devops Methodology for a Startup',
                'description' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard".
                            'dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen'.
                            'book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially'.
                            'unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and'.
                            'more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
                'tags' => 'devops,linux,ubuntu,vue',
                'read_time' => '6',
            ]
        );
        Post::firstOrCreate(
            ['slug' => Str::slug('My Journey As Developer, Wins and Challenges')],
            [
                'user_id' => 1,
                'title' => 'My Journey As Developer, Wins and Challenges',
                'description' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard".
                            'dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen'.
                            'book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially'.
                            'unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and'.
                            'more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
                'tags' => 'devops,linux,ubuntu,vue',
                'read_time' => '6',
            ]
        );
        Post::firstOrCreate(
            ['slug' => Str::slug('My Journey As Developer, Wins and Challenges')],
            [
                'user_id' => 1,
                'title' => 'My Journey As Developer, Wins and Challenges',
                'description' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard".
                            'dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen'.
                            'book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially'.
                            'unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and'.
                            'more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
                'tags' => 'devops,linux,ubuntu,vue',
                'read_time' => '6',
            ]
        );
    }
}
