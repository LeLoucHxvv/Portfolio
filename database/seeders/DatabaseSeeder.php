<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'LeLouch',
            'email' => 'LeLouch@XV.com',
            'password' => bcrypt('LELOUCH15'),
        ]);

        // \App\Models\Experience::factory()->create([
        //     'job' => 'Web Developer',
        //     'year_experience' =>'2024-2025',
        //     'company_name' => 'CDL IT Solution Innovation',
        //     'summary' => fake()->words(),
        // ]);

        // \App\Models\Education::factory()->create([
        //     'master' => 'Computer Engineering',
        //     'school_year' => '2020-2024',
        //     'place_school' => 'Southern Leyte State University (Main)',
        //     'summary' => fake()->words(),
        // ]);

        // \App\Models\SocialMedia::factory()->create([
        //     'social_link' => 'https://www.facebook.com/nathaniel.nicolas.733',
        //     'social_media' => 'facebook',
        // ]);

        // \App\Models\Skill::factory()->create([
        //     'skill' => 'Laravel',
        //     'yr_experience' => '3 Months Experience',
        //     'icon' => 'php',
        // ]);

        \App\Models\Profile::factory()->create([
            'name' => 'Nathaniel D. Nicolas',
            'bday' => fake()->date(),
            'age' => '22 Years Old',
            'website' => 'www.nathaniel.com',
            'mobile_number' => '09317605172',
            'email' => 'alynath9@gmail.com',
            'location' => 'Southern Leyte, Philippines',
            'freelance' => fake()->randomLetter('Available','Not Available'),
            'img' => fake()->image(),
        ]);

        // \App\Models\Blog::factory()->create([
        //     'file_path' => fake()->jobTitle(),
        // ]);
    }
}
