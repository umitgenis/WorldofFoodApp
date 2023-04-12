<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * @param $restaurant_id
     * @return Application|Factory|View
     */
    public function index($restaurant_id)
    {
        $categories = Category::where('restaurant_id', '=', $restaurant_id)->paginate(10);
        return view('admin.category.index', ['categories' => $categories, 'restaurant_id' => $restaurant_id]);
    }


    /**
     * @return Application|Factory|View
     */
    public function create($restaurant_id)
    {
        return view('admin.category.create', ['restaurant_id' => $restaurant_id]);
    }

    public function store(Request $request, $restaurant_id)
    {
        $request->validate([
            'name' => 'required|string|max:255|min:1',

        ]);

        $category = new Category();
        $category->name = $request->input('name');

        $category->restaurant_id = $restaurant_id;

        $insert = $category->save();

        if ($insert) {
            return back()->with('status', 'Category Addedd Success.');
        } else {
            return back()->with('error', 'Error! Category cannot add.');
        }

    }

    public function edit($category_id)
    {
        $category = Category::where('id', '=', $category_id)->first();

        if (is_null($category)) {
            return back()->with('error', 'Not Fount Category');
        }

        return view('admin.category.edit', ['category' => $category]);
    }

    public function update(Request $request, $category_id)
    {
        $category = Category::where('id', '=', $category_id)->first();

        if (is_null($category)) {
            return back()->with('error', 'Not Fount Category');
        }

        $request->validate([
            'name' => 'required|string|max:255|min:1',
        ]);

        $category->name = $request->input('name');

        $insert = $category->save();

        if ($insert) {
            return back()->with('status', 'Category Update Success.');
        } else {
            return back()->with('error', 'Error! Category cannot update.');
        }
    }

    public function delete($category_id)
    {
        $category = Category::where('id', '=', $category_id)->first();

        if (is_null($category)) {
            return back()->with('error', 'Not Fount Restaurant');
        }

        $delete = Category::where('id', '=', $category_id)->delete();
        if ($delete) {
            return back()->with('status', 'Category Delete Success.');
        } else {
            return back()->with('error', 'Error! Category cannot delete.');
        }
    }
}
