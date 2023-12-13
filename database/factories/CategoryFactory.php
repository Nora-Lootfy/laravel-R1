<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'category_name'     => fake()->unique()->randomElement([
                'Audi', 'Porsche', 'VW', 'Lexus', 'Acura', 'Infiniti', 'Cadillac', 'Tesla', 'Lincoln', 'Genesis', 'Jaguar', 'Land Rover', 'Ferrari', 'Maserati', 'Volvo', 'Bentley', 'Rolls-Royce'])
        ];
    }
}
