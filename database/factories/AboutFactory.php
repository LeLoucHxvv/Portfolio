<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\About>
 */
class AboutFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'bday' => fake()->date(),
            'website' => fake(),
            'mobile_number' => fake()->phoneNumber(),
            'email' => fake()->email(),
            'location' => fake()->address(),
        ];
    }
}
