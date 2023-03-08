<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Http\UploadedFile;

/**
 * @extends Factory
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->company,
            'email' => $this->faker->unique()->safeEmail(),
            'logo' => UploadedFile::fake()->image('company.png', 100, 100),
            'website' => $this->faker->unique()->name,
        ];
    }
}
