<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Ticket;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<\App\Models\Ticket>
 */
final class TicketFactory extends Factory
{
    /**
    * The name of the factory's corresponding model.
    *
    * @var string
    */
    protected $model = Ticket::class;

    /**
    * Define the model's default state.
    *
    * @return array
    */
    public function definition(): array
    {
        return [
            'user_id' => \App\Models\User::factory(),
            'admin_id' => \App\Models\Admin::factory(),
            'subject' => fake()->title,
            'content' => fake()->optional()->text,
            'attachment' => fake()->optional()->word,
            'status' => fake()->randomNumber(),
            'reply_to_id' => fake()->optional()->randomNumber(),
        ];
    }
}
