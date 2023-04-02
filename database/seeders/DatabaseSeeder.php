<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\Restaurant;
use Database\Factories\CategoryFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $customers = \App\Models\User::factory(10)->create();
        $admins = \App\Models\User::factory(2)->admin()->create();

        $vendors = \App\Models\User::factory(8)->vendor()->create();

        foreach ($vendors as $vendor) {
//            $restaurant = Restaurant::factory()->for($vendor)->create();
            $restaurants = Restaurant::factory()->count(1)->for($vendor)->create();
            foreach ($restaurants as $restaurant) {
                $categories = Category::factory()->count(3)->for($restaurant)->create();
                foreach ($categories as $category) {
                    $products = Product::factory()->count(6)->for($category)->for($restaurant)->create();
                }


            }

        }



        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
