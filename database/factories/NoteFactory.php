<?php

namespace Database\Factories;

use App\Models\Note;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class NoteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Note::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $slug = static function(array $attributes) {
            return Str::slug($attributes['title']);
        };
        return [
            'user_id' => User::factory(),
            'title' => $this->faker->realText($this->faker->numberBetween(20, 70)),
            'slug' => $slug,
            'description' => $this->faker->realText($this->faker->numberBetween(100, 300)),
            'tags' => $this->faker->word().",".$this->faker->word().",".$this->faker->word(),
            'read_minute' => $this->faker->randomNumber(1)
        ];
    }
}
