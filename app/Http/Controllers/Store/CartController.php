<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function addItem($product_id, $quantity)
    {
        $cart = Session::get('cart');
        if (isset($cart[$product_id])) {
            $cart[$product_id]['quantity'] += $quantity;

        } else {
            $cart[$product_id] = ['product_id' => $product_id, 'quantity'=>$quantity] ;
        }
        Session::put('cart', $cart);

        return redirect()->back()->with('status','Cart Add Success.');;

    }

    public function updateItem($product_id, $quantity)
    {
        $cart = Session::get('cart');
        if (isset($cart[$product_id])) {
            $cart[$product_id]['quantity'] = $quantity;

        } else {
            $cart[$product_id] = ['product_id' => $product_id, 'quantity'=>$quantity] ;
        }
        Session::put('cart', $cart);

        return redirect()->back();

    }

    public function removeItem($product_id)
    {
        $cart = Session::get('cart');
        if (isset($cart[$product_id])) {
            unset($cart[$product_id]);
            Session::put('cart', $cart);
        }

        return redirect()->back();

    }

    public function empty()
    {
        Session::forget('cart');

        return redirect()->back()->with('status','Cart Empty Success.');
    }


    public function detail(){

        if (!Session::has('cart'))
        {
            return redirect()->back()->with('error','Error! Emtpy Cart');
        }

        $items = Session::get('cart');
        $products = Product::whereIn('id',array_keys($items))->get()->keyBy('id');

        $total = 0;
        foreach ($items as $item){
            $total += $item['quantity']*$products[$item['product_id']]['price'];
        }

        return view('store.cart.detail',['items'=>$items,'products'=>$products,'total'=>$total]);
    }

    public function test()
    {
        dd(Session::get('cart',),Session::get('current_address_id'));
    }
}
