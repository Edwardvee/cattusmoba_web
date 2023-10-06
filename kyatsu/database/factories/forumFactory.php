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
        function Hola()
        {
        }
        return [
            /*             'id' => fake()->unique()->numberBetween(1,234),
 */
            'user_poster' => fake()->name(),
            'isChildOf' => fake()->numberBetween(2, 25),
            'content' => fake()->words(120),
            'reply_count' => fake()->numberBetween(0, 13),
            'like_count' => fake()->numberBetween(0, 432),
            'created_at' => fake()->dateTimeThisYear(),
            'deleted_at' => NULL

        ];
    }
}
