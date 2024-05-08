<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Experience>
 */
class ExperienceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'job' => fake()->jobTitle(),
            'year_experience' => fake()->year(),
            'company_name' => fake()->address(),
            'summary' => fake()->name(),
        ];
    }
}
