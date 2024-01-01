<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\UserIp;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<\App\Models\UserIp>
 */
final class UserIpFactory extends Factory
{
    /**
    * The name of the factory's corresponding model.
    *
    * @var string
    */
    protected $model = UserIp::class;

    /**
    * Define the model's default state.
    *
    * @return array
    */
    public function definition(): array
    {
        return [
            'ip_address' => fake()->word,
            'user_id' => \App\Models\User::factory(),
            'created_at' => fake()->dateTime(),
        ];
    }
}
