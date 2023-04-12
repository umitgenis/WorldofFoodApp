<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function detail($id)
    {

        $restaurant = Restaurant::where('id', '=', $id)->with('categories')->first();
        if (empty($restaurant))
        {
            return redirect('/');
        }
        $categories = $restaurant->categories()->with('products')->get();
        return view('store.restaurant.detail', ['restaurant' => $restaurant, 'categories' => $categories]);
    }
}
