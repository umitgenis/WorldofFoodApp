<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class RestaurantController extends Controller
{

    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $restaurants = Restaurant::where('user_id','=',Auth::id())->paginate(10);
        return view('admin.restaurant.index', ['restaurants' => $restaurants]);
    }

    /**
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('admin.restaurant.create');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|min:1',
            'city' => 'required|string|min:1',
            'address' => 'required|string|max:255|min:1',
            'open_time' => 'required',
            'close_time' => 'required',
            'image' => 'required|image|mimes:jpeg,jpg,bmp,png|max:2048|dimensions:max_width=1024,max_height=1024',
        ]);

        $path = $request->file('image')->store('images/restaurants');

        $restaurant = new Restaurant();
        $restaurant->name = $request->input('name');
        $restaurant->address = $request->input('address');
        $restaurant->city = $request->input('city');
        $restaurant->open_time = $request->input('open_time');
        $restaurant->close_time = $request->input('close_time');
        $restaurant->closed = false;
        $restaurant->user_id = Auth::id();

        $restaurant->image_path = $path;

        $insert = $restaurant->save();

        if ($insert) {
            return back()->with('status', 'Restaurant Added Success.');
        }else{
            return back()->with('error', 'Error! Restaurant cannot add.');
        }

    }

    /**
     * @param $id
     * @return Application|Factory|View|RedirectResponse
     */
    public function edit($id)
    {
        $restaurant = Restaurant::where('id','=',$id)->first();

//        if (! Gate::allows('manage-restaurant', $restaurant)) {
//            abort(403);
//        }

        if(is_null($restaurant)){
            return back()->with('error','Not Fount Restaurant');
        }

        return view('admin.restaurant.edit',['restaurant'=>$restaurant]);
    }

    /**
     * @param Request $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $restaurant = Restaurant::where('id','=',$id)->first();

        if(is_null($restaurant)){
            return back()->with('error','Not Fount Restaurant');
        }

        $request->validate([
            'name' => 'required|string|max:255|min:1',
            'city' => 'required|string|min:1',
            'address' => 'required|string|max:255|min:1',
            'open_time' => 'required',
            'close_time' => 'required',
            'image' => 'required|image|mimes:jpeg,jpg,bmp,png|max:2048|dimensions:max_width=1024,max_height=1024',
        ]);

        if ($request->file('image')) {
            Storage::delete($restaurant['image_path']);
            $path = $request->file('image')->store('images/restaurants');
        }

        $restaurant->name = $request->input('name');
        $restaurant->address = $request->input('address');
        $restaurant->city = $request->input('city');
        $restaurant->open_time = $request->input('open_time');
        $restaurant->close_time = $request->input('close_time');
        $restaurant->closed = false;
        $restaurant->user_id = Auth::id();

        $restaurant->image_path = $path;

        $insert = $restaurant->save();

        if ($insert) {
            return back()->with('status', 'Restaurant Update Success.');
        }else{
            return back()->with('error', 'Error! Restaurant cannot update.');
        }
    }

    /**
     * @param $id
     * @return RedirectResponse
     */
    public function delete($id)
    {
        $restaurant = Restaurant::where('id','=',$id)->first();

        if(is_null($restaurant)){
            return back()->with('error','Not Fount Restaurant');
        }

        if ($restaurant['image_path']) {
            Storage::delete($restaurant['image_path']);
        }

        $delete = Restaurant::where('id','=',$id)->delete();
        if ($delete) {
            return back()->with('status', 'Restaurant Delete Success.');
        }else{
            return back()->with('error', 'Error! Restaurant cannot delete.');
        }
    }

    /**
     * @param $id
     * @return RedirectResponse
     */
    public function status($id)
    {
        $restaurant = Restaurant::where('id','=',$id)->first();

        if(is_null($restaurant)){
            return back()->with('error','Not Fount Restaurant');
        }

        $restaurant->closed = !($restaurant->closed);

        $status = $restaurant->save();
        if ($status) {
            return back()->with('status', 'Restaurant Status Change Success.');
        }else{
            return back()->with('error', 'Error! Restaurant status cannot change .');
        }

    }
}
