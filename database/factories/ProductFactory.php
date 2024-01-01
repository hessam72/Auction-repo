<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<\App\Models\Product>
 */
final class ProductFactory extends Factory
{
    /**
    * The name of the factory's corresponding model.
    *
    * @var string
    */
    protected $model = Product::class;

    /**
    * Define the model's default state.
    *
    * @return array
    */
    public function definition(): array
    {
        return [
            'category_id' => \App\Models\Category::factory(),
            'title' => fake()->title,
            'discount' => fake()->randomNumber(),
            'sales_count' => fake()->randomNumber(),
            'short_desc' => fake()->optional()->text,
            'description' => fake()->optional()->text,
            'price' => fake()->optional()->randomNumber(),
            'product_inventory' => fake()->randomNumber(),
        ];
    }
}
