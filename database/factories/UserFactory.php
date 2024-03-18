<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<\App\Models\User>
 */
final class UserFactory extends Factory
{
    /**
    * The name of the factory's corresponding model.
    *
    * @var string
    */
    protected $model = User::class;

    /**
    * Define the model's default state.
    *
    * @return array
    */
    public function definition(): array
    {
        return [
            'username' => fake()->userName,
            'bio' => fake()->optional()->text,
            'email' => fake()->safeEmail,
            'city_id' => \App\Models\City::factory(),
            'status' => fake()->randomNumber(),
            'profile_pic' => fake()->optional()->text,
            'password' => bcrypt(fake()->password),
            'email_verified_at' => fake()->optional()->dateTime(),
            'bid_amount' => fake()->randomNumber(),
            'remember_token' => Str::random(10),
        ];
    }
}
