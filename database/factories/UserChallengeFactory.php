<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\UserChallenge;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<\App\Models\UserChallenge>
 */
final class UserChallengeFactory extends Factory
{
    /**
    * The name of the factory's corresponding model.
    *
    * @var string
    */
    protected $model = UserChallenge::class;

    /**
    * Define the model's default state.
    *
    * @return array
    */
    public function definition(): array
    {
        return [
            'user_id' => \App\Models\User::factory(),
            'challenge_id' => \App\Models\Challenge::factory(),
            'status' => fake()->randomNumber(),
            'progress' => fake()->randomNumber(),
            'created_at' => fake()->dateTime(),
        ];
    }
}
