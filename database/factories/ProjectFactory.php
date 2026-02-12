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
            'date' => $this->faker->date(),          // adjust if your column is date/datetime/string
            'description' => $this->faker->paragraph(),
            'is_featured' => $this->faker->boolean(30),
        ];
    }
}
