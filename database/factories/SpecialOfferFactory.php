<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\SpecialOffer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<\App\Models\SpecialOffer>
 */
final class SpecialOfferFactory extends Factory
{
    /**
    * The name of the factory's corresponding model.
    *
    * @var string
    */
    protected $model = SpecialOffer::class;

    /**
    * Define the model's default state.
    *
    * @return array
    */
    public function definition(): array
    {
        return [
            'type' => fake()->randomNumber(),
            'discount_amount' => fake()->randomNumber(),
            'item_id' => fake()->randomNumber(),
            'expiration_date' => fake()->dateTime(),
            'status' => fake()->randomNumber(),
        ];
    }
}
