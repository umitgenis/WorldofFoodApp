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
//        dd(Restaurant::where('id','=',$id)->with('categories')->first());
//        $restaurant = Restaurant::where('id', '=', $id)->with('categories')->with('products')->first();
        $restaurant = Restaurant::where('id', '=', $id)->with('categories')->first();
        if (empty($restaurant))
        {
            return redirect('/');
        }
        $categories = $restaurant->categories()->with('products')->get(); // categorileri getirdi her cate içinde kendi productlarınıda getirdi.
//        dd($restaurant,$categories);
        return view('store.restaurant.detail', ['restaurant' => $restaurant, 'categories' => $categories]);
    }
}
