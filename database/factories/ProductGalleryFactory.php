<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\ProductGallery;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<\App\Models\ProductGallery>
 */
final class ProductGalleryFactory extends Factory
{
    /**
    * The name of the factory's corresponding model.
    *
    * @var string
    */
    protected $model = ProductGallery::class;

    /**
    * Define the model's default state.
    *
    * @return array
    */
    public function definition(): array
    {
        return [
            'product_id' => \App\Models\Product::factory(),
            'image' => fake()->optional()->text,
            'type' => fake()->randomNumber(),
        ];
    }
}
