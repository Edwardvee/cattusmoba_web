<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Foro;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class forumFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */ 
    protected $model = Foro::class;

    public function definition(): array
    {
        return [
            /*             'id' => fake()->unique()->numberBetween(1,234),
 */
            'user_poster' => $this->faker->firstName(),
            'isChildOf' => $this->faker->numberBetween(0, 25),
            'content' => $this->faker->paragraph(6),
            'reply_count' => $this->faker->numberBetween(0, 13),
            'like_count' => $this->faker->numberBetween(0, 432),
            'created_at' => $this->faker->dateTime(),
            'updated_at' => $this->faker->dateTime(),
            'deleted_at' => NULL
        ];
    }
}
