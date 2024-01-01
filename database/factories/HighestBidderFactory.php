<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\HighestBidder;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<\App\Models\HighestBidder>
 */
final class HighestBidderFactory extends Factory
{
    /**
    * The name of the factory's corresponding model.
    *
    * @var string
    */
    protected $model = HighestBidder::class;

    /**
    * Define the model's default state.
    *
    * @return array
    */
    public function definition(): array
    {
        return [
            'user_id' => \App\Models\User::factory(),
            'time_spent' => fake()->randomNumber(),
            'current_level_id' => \App\Models\HighestBidderLevel::factory(),
            'multiplier' => fake()->randomNumber(),
        ];
    }
}
