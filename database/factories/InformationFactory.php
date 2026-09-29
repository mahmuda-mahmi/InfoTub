<?php

namespace Database\Factories;

use App\Models\Information;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Information>
 */
class InformationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'title' => fake()->sentence(6),
            'slug' => fake()->unique()->slug(),
            'description' => fake()->sentence(),
            'content' => fake()->paragraphs(4, true),
            'status' => 'draft',
            'published_at' => null,
        ];
    }

    /**
     * Create a published information record.
     */
    public function published(): static
    {
        return $this->state(fn (array $attributes): array => [
            'status' => 'published',
            'published_at' => now(),
        ]);
    }

    /**
     * Create a draft information record.
     */
    public function draft(): static
    {
        return $this->state(fn (array $attributes): array => [
            'status' => 'draft',
            'published_at' => null,
        ]);
    }
}