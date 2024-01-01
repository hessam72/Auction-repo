<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\UserRedeemCode;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<\App\Models\UserRedeemCode>
 */
final class UserRedeemCodeFactory extends Factory
{
    /**
    * The name of the factory's corresponding model.
    *
    * @var string
    */
    protected $model = UserRedeemCode::class;

    /**
    * Define the model's default state.
    *
    * @return array
    */
    public function definition(): array
    {
        return [
            'user_id' => \App\Models\User::factory(),
            'redeem_code_id' => \App\Models\RedeemCode::factory(),
            'created_at' => fake()->dateTime(),
        ];
    }
}
