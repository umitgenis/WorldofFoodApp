<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

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
            'name' => fake()->unique()->colorName()." Restaurant",
            'address' => fake()->address(),
//            'city' => fake()->numberBetween($min = 1, $max = 81),
            'city' => fake()->city(),
            'open_time' => fake()->time('H:i'),
            'close_time' => fake()->time('H:i'),
            'closed' => fake()->boolean(),
            'image_path' => fake()->image( public_path('images/restaurants'),200,200,'LOGO',false,),
        ];
    }
}
