<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\HighestBidderLevel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<\App\Models\HighestBidderLevel>
 */
final class HighestBidderLevelFactory extends Factory
{
    /**
    * The name of the factory's corresponding model.
    *
    * @var string
    */
    protected $model = HighestBidderLevel::class;

    /**
    * Define the model's default state.
    *
    * @return array
    */
    public function definition(): array
    {
        return [
            'name' => fake()->optional()->name,
            'time_needed' => fake()->randomNumber(),
            'bid_reward' => fake()->randomNumber(),
        ];
    }
}
