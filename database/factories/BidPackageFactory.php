<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\BidPackage;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<\App\Models\BidPackage>
 */
final class BidPackageFactory extends Factory
{
    /**
    * The name of the factory's corresponding model.
    *
    * @var string
    */
    protected $model = BidPackage::class;

    /**
    * Define the model's default state.
    *
    * @return array
    */
    public function definition(): array
    {
        return [
            'bid_amount' => fake()->randomNumber(),
            'price' => fake()->randomNumber(),
            'discount' => fake()->randomNumber(),
        ];
    }
}
