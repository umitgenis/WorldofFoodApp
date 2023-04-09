<?php

namespace Database\Factories;

use App\Models\Restaurant;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

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
//        Storage::deleteDirectory('images/products');
//        Storage::makeDirectory('images/products');
        return [
            'sku_code' => fake()->ean13 (),
            'name' => fake()->word(). " Ürünümüz",
            'price' => fake()->randomNumber(2),
//            'open_time' => fake()->time('H:i'),
//            'close_time' => fake()->time('H:i'),
            'image_path' => fake()->image( public_path('images/products'),383,323,'FOOD'),
        ];
    }
}
