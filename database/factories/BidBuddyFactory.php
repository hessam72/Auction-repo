<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\BidBuddy;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<\App\Models\BidBuddy>
 */
final class BidBuddyFactory extends Factory
{
    /**
    * The name of the factory's corresponding model.
    *
    * @var string
    */
    protected $model = BidBuddy::class;

    /**
    * Define the model's default state.
    *
    * @return array
    */
    public function definition(): array
    {
        return [
            'user_id' => \App\Models\User::factory(),
            'auction_id' => \App\Models\Auction::factory(),
            'available_bids' => fake()->randomNumber(),
            'status' => fake()->randomNumber(),
            'created_at' => fake()->dateTime(),
        ];
    }
}
