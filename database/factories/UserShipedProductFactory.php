<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\UserShipedProduct;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<\App\Models\UserShipedProduct>
 */
final class UserShipedProductFactory extends Factory
{
    /**
    * The name of the factory's corresponding model.
    *
    * @var string
    */
    protected $model = UserShipedProduct::class;

    /**
    * Define the model's default state.
    *
    * @return array
    */
    public function definition(): array
    {
        return [
            'user_id' => \App\Models\User::factory(),
            'status' => fake()->randomNumber(),
            'address' => fake()->address,
            'postal_code' => fake()->randomNumber(),
            'product_id' => \App\Models\Product::factory(),
            'state_id' => \App\Models\State::factory(),
            'city_id' => \App\Models\City::factory(),
        ];
    }
}
