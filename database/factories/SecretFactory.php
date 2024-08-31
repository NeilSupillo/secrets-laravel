<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Secret>
 */
class SecretFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'secret' => fake()->paragraph(),
            'user_id' => \App\Models\User::factory(), // Generates a user and uses its ID
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
