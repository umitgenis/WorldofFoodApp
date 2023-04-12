<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * @param $restaurant_id
     * @param $category_id
     * @return Application|Factory|View
     */
    public function index($restaurant_id, $category_id)
    {
        $products = Product::where('category_id', '=', $category_id)->paginate(10);
        return view('admin.product.index', ['products' => $products, 'restaurant_id' => $restaurant_id, 'category_id' => $category_id]);
    }

    public function create($restaurant_id, $category_id)
    {
        return view('admin.product.create', ['restaurant_id' => $restaurant_id, 'category_id' => $category_id]);
    }

    /**
     * @param Request $request
     * @param $restaurant_id
     * @param $category_id
     * @return RedirectResponse
     */
    public function store(Request $request, $restaurant_id, $category_id)
    {
        $request->validate([
            'name' => 'required|string|max:255|min:1',
            'sku_code' => 'required|string|min:13|max:13',
            'price' => 'required|string|min:1',
            'image' => 'required|image|mimes:jpeg,jpg,bmp,png|max:2048|dimensions:max_width=1024,max_height=1024'
        ]);

        $path = $request->file('image')->store('images/products');

        $product = new Product();
        $product->name = $request->input('name');
        $product->sku_code = $request->input('sku_code');
        $product->price = $request->input('price');
        $product->image_path = $path;

        $product->category_id = $category_id;
        $product->restaurant_id = $restaurant_id;

        $insert = $product->save();

        if ($insert) {
            return back()->with('status', 'Product Addedd Success.');
        } else {
            return back()->with('error', 'Error! Product cannot add.');
        }

    }

    /**
     * @param $product_id
     * @return Application|Factory|View|RedirectResponse
     */
    public function edit($product_id)
    {
        $product = Product::where('id', '=', $product_id)->first();

        if (is_null($product_id)) {
            return back()->with('error', 'Not Fount Product');
        }
        return view('admin.product.edit', ['product' => $product]);
    }

    /**
     * @param Request $request
     * @param $product_id
     * @return RedirectResponse
     */
    public function update(Request $request, $product_id)
    {
        $product = Product::where('id', '=', $product_id)->first();

        if (is_null($product)) {
            return back()->with('error', 'Not Fount Product');
        }

        $request->validate([
            'name' => 'required|string|max:255|min:1',
            'sku_code' => 'required|string|min:13|max:13',
            'price' => 'required|string|min:1',
            'image' => 'required|image|mimes:jpeg,jpg,bmp,png|max:2048|dimensions:max_width=1024,max_height=1024',
        ]);

        if ($request->file('image')) {
            Storage::delete($product['image_path']);
            $path = $request->file('image')->store('images/products');
        }

        $product->name = $request->input('name');
        $product->sku_code = $request->input('sku_code');
        $product->price = $request->input('price');
        $product->image_path = $path;

        $insert = $product->save();

        if ($insert) {
            return back()->with('status', 'Product Update Success.');
        } else {
            return back()->with('error', 'Error! Product cannot update.');
        }
    }

    /**
     * @param $product_id
     * @return RedirectResponse
     */
    public function delete($product_id)
    {
        $product = Product::where('id', '=', $product_id)->first();

        if (is_null($product)) {
            return back()->with('error', 'Not Fount Restaurant');
        }

        if ($product['image_path']) {
            Storage::delete($product['image_path']);
        }

        $delete = Product::where('id', '=', $product_id)->delete();
        if ($delete) {
            return back()->with('status', 'Product Delete Success.');
        } else {
            return back()->with('error', 'Error! Product cannot delete.');
        }
    }
}
