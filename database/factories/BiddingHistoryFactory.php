<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\BiddingHistory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<\App\Models\BiddingHistory>
 */
final class BiddingHistoryFactory extends Factory
{
    /**
    * The name of the factory's corresponding model.
    *
    * @var string
    */
    protected $model = BiddingHistory::class;

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
            'bid_price' => fake()->randomNumber(),
            'created_at' => fake()->dateTime(),
        ];
    }
}
