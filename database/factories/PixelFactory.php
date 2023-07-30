<?php

namespace Database\Factories;

use App\Models\Pixel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pixel>
 */
class PixelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'x' => $this->faker->numberBetween(0, 19),
            'y' => $this->faker->numberBetween(0, 19),
            'color' => $this->faker->randomElement(['red', 'blue', 'green', 'yellow', 'purple', 'orange', 'gray']),
            'canvas_id' => 1,
        ];
    }
}
