<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderProduct;
use App\OrderStatus;
use Eastwest\Json\Json;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class OrderController extends Controller
{

    public function index()
    {
        $status = OrderStatus::where('name', 'pending')->first();
        $orders = Auth::user()->orders->where('status_id', $status->id);

        return view('Home.user-orders', [
            'orders' => $orders
        ]);
    }

    public function history(){
        $status = OrderStatus::where('name', 'delivered')->first();
        $orders = Auth::user()->orders->where('status_id', $status->id);

        return view('Home.user-orders-history', [
            'orders' => $orders
        ]);
    }

    public function canceled(){
        $status = OrderStatus::where('name', 'canceled')->first();
        $orders = Auth::user()->orders->where('status_id', $status->id);

        return view('Home.user-orders-canceled', [
            'orders' => $orders
        ]);
    }

    public function store(Request $request)
    {
        $status = OrderStatus::where('name', 'pending')->first();

        if (Cookie::has('cart')) {
            $order = Order::create([
                'user_id' => Auth::user()->id,
                'status_id' => $status->id
            ]);

            $products = Cookie::get('cart');
            $products = Json::decode($products);

            foreach ($products as $product) {
                OrderProduct::create([
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'quantity' => $product->quantity
                ]);
            }

            Cookie::queue(Cookie::forget('cart'));

        } else {
            abort(403, 'Cookie is Expired');
        }

        return redirect('/orders')->with([
            'success' => __('notifications.add-order')
        ]);
    }

   public function cancel(Order $order){
        if ($order->status_id != OrderStatus::where('name','pending')->first()->id){
            abort('500','You Can Not Cancel This Order');
        }
        $order->status_id = OrderStatus::where('name','canceled')->first()->id;
        $order->save();

        return back()->with([
            'success' => __('notifications.cancel-order')
        ]);
   }
}
