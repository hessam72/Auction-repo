<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Auction;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<\App\Models\Auction>
 */
final class AuctionFactory extends Factory
{
    /**
    * The name of the factory's corresponding model.
    *
    * @var string
    */
    protected $model = Auction::class;

    /**
    * Define the model's default state.
    *
    * @return array
    */
    public function definition(): array
    {
        return [
            'current_price' => fake()->randomNumber(),
            'current_winner_id' => \App\Models\User::factory(),
            'no_jumper_limit' => fake()->optional()->randomNumber(),
            'timer' => fake()->dateTime(),
            'min_price' => fake()->randomNumber(),
            'status' => fake()->randomNumber(),
            'final_winner_id' => \App\Models\User::factory(),
            'product_id' => \App\Models\Product::factory(),
        ];
    }
}
