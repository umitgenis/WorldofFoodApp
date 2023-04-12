<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function restaurant(Request $request)
    {
        if ($request->has('search')) {
            $search = $request->query('search');
            $data = Restaurant::where('name','ilike','%'.$search.'%')->paginate(4)->withQueryString();
            return view('store.search.restaurant',['data'=>$data]);
        } else {
            return redirect('/');
        }
    }
    public function city(Request $request)
    {

        if ($request->has('citySelect') && $request->has('search')) {
            $search = $request->query('search');
            $city =  $request->input('citySelect');

            $restaurants = Restaurant::where('city','ilike','%'.$city.'%')->where('name','ilike','%'.$search.'%')->paginate(4)->withQueryString();

            $products = Product::whereHas('restaurant',function ($query) use($city) {
                $query->where('city','ilike','%'.$city.'%');
            })->where('name','ilike','%'.$search.'%')->paginate(4)->withQueryString();
            return view('store.search.city',['restaurants'=>$restaurants,'products'=>$products]);
        } else {
            return redirect('/');
        }
    }
}
