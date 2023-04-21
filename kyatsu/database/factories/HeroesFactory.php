<?php

namespace Database\Factories;

use App\Models\Heroes;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class HeroesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Heroes::class;

    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'description' => fake()->words(10, true)
        ];
    }
}
