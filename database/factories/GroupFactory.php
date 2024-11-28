<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Group>
 */
class GroupFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "name" => fake()->word(random_int(1, 3)),
            "code" => fake()->unique()->word(),
            "is_active" => random_int(0, 1),
            "school_id" => random_int(1, 10),
        ];
    }
}
