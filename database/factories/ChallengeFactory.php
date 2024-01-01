<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Challenge;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<\App\Models\Challenge>
 */
final class ChallengeFactory extends Factory
{
    /**
    * The name of the factory's corresponding model.
    *
    * @var string
    */
    protected $model = Challenge::class;

    /**
    * Define the model's default state.
    *
    * @return array
    */
    public function definition(): array
    {
        return [
            'reward_id' => \App\Models\Reward::factory(),
            'description' => fake()->text,
            'type' => fake()->randomNumber(),
            'time_type' => fake()->randomNumber(),
            'category_id' => \App\Models\Category::factory(),
            'number_to_win' => fake()->randomNumber(),
            'status' => fake()->randomNumber(),
        ];
    }
}
