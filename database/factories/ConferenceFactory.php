<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Conference>
 */
class ConferenceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence,
            'location' => fake()->city . ', ' . fake()->country,
            'description' => fake()->paragraph,
            'url' => fake()->url,
            'starts_at' => $startsAt = now()->addMonths(6),
            'ends_at' => $startsAt->clone()->addDays(3),
            'cfp_starts_at' => $startsAt->clone()->subMonths(4),
            'cfp_ends_at' => $startsAt->clone()->addMonths(2),
        ];
    }
}
