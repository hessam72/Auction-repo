<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\RedeemCode;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<\App\Models\RedeemCode>
 */
final class RedeemCodeFactory extends Factory
{
    /**
    * The name of the factory's corresponding model.
    *
    * @var string
    */
    protected $model = RedeemCode::class;

    /**
    * Define the model's default state.
    *
    * @return array
    */
    public function definition(): array
    {
        return [
            'code' => fake()->randomNumber(),
            'value' => fake()->randomNumber(),
            'count_of_use' => fake()->randomNumber(),
            'status' => fake()->randomNumber(),
            'created_at' => fake()->dateTime(),
        ];
    }
}
