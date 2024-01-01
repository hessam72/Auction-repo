<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Winner;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<\App\Models\Winner>
 */
final class WinnerFactory extends Factory
{
    /**
    * The name of the factory's corresponding model.
    *
    * @var string
    */
    protected $model = Winner::class;

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
            'win_price' => fake()->randomNumber(),
            'created_at' => fake()->dateTime(),
        ];
    }
}
