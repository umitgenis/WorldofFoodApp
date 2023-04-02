<?php

namespace Database\Factories;

use App\Models\Restaurant;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'sku_code' => fake()->ean13 (),
            'name' => fake()->unique()->colorName(),
            'price' => fake()->randomNumber(2),
//            'open_time' => fake()->time('H:i'),
//            'close_time' => fake()->time('H:i'),
            'image_path' => fake()->image(),
        ];
    }
}
