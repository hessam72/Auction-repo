<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\BuyItNowOffer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<\App\Models\BuyItNowOffer>
 */
final class BuyItNowOfferFactory extends Factory
{
    /**
    * The name of the factory's corresponding model.
    *
    * @var string
    */
    protected $model = BuyItNowOffer::class;

    /**
    * Define the model's default state.
    *
    * @return array
    */
    public function definition(): array
    {
        return [
            'product_id' => \App\Models\Product::factory(),
            'spent_bids' => fake()->randomNumber(),
            'time_limit' => fake()->dateTime(),
        ];
    }
}
