<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $orders = Order::where('user_id','=',Auth::id())->paginate(10);

        return view('admin.order.index',['orders'=>$orders]);
    }

    /**
     * @param $order_number
     * @return Application|Factory|View|RedirectResponse
     */
    public function detail($order_number)
    {
        $order = Order::where('order_number','=',$order_number)->with('user')->with('order_items')->first();

        if(is_null($order)){
            return back()->with('error','Not Fount Order');
        }

        return view('admin.order.detail',['order'=>$order]);

    }

    public function orderItems($order_id)
    {
        $order_items = OrderItem::where('order_id','=',$order_id)->get();

        if(is_null($order_items)){
            return back()->with('error','Not Fount Order Items');
        }
        return view('admin.order.orderItems',['order_items'=>$order_items]);

    }

    public function status(Request $request, $order_id)
    {
        $order = Order::where('id','=',$order_id)->first();
        $query=$request->query('status');

        if(is_null($order)){
            return back()->with('error','Not Fount Order');
        }

        $order->status = $query;

        $status = $order->save();

        if ($status) {
            return back()->with('status', 'Order Status Change Success.');
        }else{
            return back()->with('error', 'Error! Order status cannot change .');
        }

    }
}
