<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\UserAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class CheckoutController extends Controller
{
    public function index(Request $request)
    {

        $current_address_id = Session::get('current_address_id');
        $currentAddress = UserAddress::find($current_address_id);

        $items = Session::get('cart');
        $products = Product::whereIn('id',array_keys($items))->get()->keyBy('id');

        $total = 0;
        foreach ($items as $item){
            $total += $item['quantity']*$products[$item['product_id']]['price'];
        }

        try {
            DB::transaction(function () use($products,$request,$total,$currentAddress,$items){
                $order = new Order();
                $order->user_id = Auth::id();
                $order->restaurant_id = $products->first()->restaurant_id;
                $order->order_number = Str::uuid();
                $order->status = Order::PENDING;
                $order->total_price = $total;
                $order->note = $request->input('note');
                $order->address = $currentAddress->address;
                $order->city = $currentAddress->city;

                $order->save();

                foreach ($products as $product)
                {
                    $orderItem = new OrderItem();
                    $orderItem->order_id = $order->id;
                    $orderItem->quantity = $items[$product->id]['quantity'];
                    $orderItem->unit_price = $product->price;
                    $orderItem->product_id = $product->id;
                    $orderItem->product_sku_code = $product->sku_code;
                    $orderItem->product_name = $product->name;

                    $orderItem->save();
                }
            });
        }catch (\Exception $e){
            return redirect()->back()->with('error','Error! Order cannot create.');
        }


        Session::forget('cart');

        return redirect('/')->with('status','Success, Order Created.');

    }
}
