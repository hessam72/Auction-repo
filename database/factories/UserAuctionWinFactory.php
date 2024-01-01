<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\UserAuctionWin;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<\App\Models\UserAuctionWin>
 */
final class UserAuctionWinFactory extends Factory
{
    /**
    * The name of the factory's corresponding model.
    *
    * @var string
    */
    protected $model = UserAuctionWin::class;

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
            'is_paid' => fake()->randomNumber(),
            'final_price' => fake()->randomNumber(),
        ];
    }
}
