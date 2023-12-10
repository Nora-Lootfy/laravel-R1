<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\File;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Place>
 */
class PlaceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $publicPath = public_path();
        $subdirectory = 'assets/images';
        $files = File::glob($publicPath . '/' . $subdirectory . '/*');

        $files = array_filter($files, 'is_file');

        $files = array_map(
            fn($file) => array_slice(explode('/', $file), -1)[0],
            $files
        );

        return [
            'title'         => fake()->company() ,
            'description'   => fake()->text(),
            'priceFrom'     => fake()->numberBetween(1, 10),
            'priceTo'       => fake()->numberBetween(10, 100),
            'image'         => fake()->randomElement($files)
        ];
    }
}
