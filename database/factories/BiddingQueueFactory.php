<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\BiddingQueue;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<\App\Models\BiddingQueue>
 */
final class BiddingQueueFactory extends Factory
{
    /**
    * The name of the factory's corresponding model.
    *
    * @var string
    */
    protected $model = BiddingQueue::class;

    /**
    * Define the model's default state.
    *
    * @return array
    */
    public function definition(): array
    {
        return [
            'bid_buddy_id' => \App\Models\BidBuddy::factory(),
            'auction_id' => \App\Models\Auction::factory(),
            'status' => fake()->randomNumber(),
            'created_at' => fake()->dateTime(),
        ];
    }
}
