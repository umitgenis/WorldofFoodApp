<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Restaurant>
 */
class RestaurantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->unique()->company(),
            'address' => fake()->address(),
            'city' => fake()->numberBetween($min = 1, $max = 81),
            'open_time' => fake()->time('H:i'),
            'close_time' => fake()->time('H:i'),
            'closed' => fake()->boolean(),
        ];
    }
}
