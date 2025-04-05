<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'transaction_id' => fake()->unique()->shuffle('ABCDEF123456789'),
            'date' => fake()->date('Y-m-d H:i:s', 'now'),
            'amount' => fake()->randomNumber(9),
            'description' => fake()->sentence(4),
        ];
    }
}
