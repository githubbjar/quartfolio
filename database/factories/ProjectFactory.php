<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProjectFactory extends Factory
{
    public function definition(): array
    {
        $title = $this->faker->sentence(3);

        return [
            'title' => rtrim($title, '.'),
            'slug' => Str::slug($title).'-'.$this->faker->unique()->numberBetween(1000, 9999),
            'type' => $this->faker->randomElement(['cover', 'layout', 'website', 'eblast']),
            'year' => $this->faker->numberBetween(2018, now()->year),
            'quarter' => $this->faker->numberBetween(1, 4),
            'description' => $this->faker->paragraph(),
            'is_featured' => $this->faker->boolean(30),
        ];
    }
}
