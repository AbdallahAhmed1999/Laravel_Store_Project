<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Order;
use App\OrderStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class OrderController extends Controller
{

    public function pending()
    {
        Gate::authorize('show-orders-pending');

        $status = OrderStatus::where('name', 'pending')->first();
        $orders = Order::where('status_id', $status->id)->orderBy('id','desc')->paginate(5);

        return view('Admin.Order.pending',[
            'orders' => $orders
        ]);
    }

    public function delivered()
    {
        Gate::authorize('show-orders-delivered');

        $status = OrderStatus::where('name', 'delivered')->first();
        $orders = Order::where('status_id', $status->id)->orderBy('id','desc')->paginate(5);
        return view('Admin.Order.delivered',[
            'orders' => $orders
        ]);
    }

    public function canceled()
    {
        Gate::authorize('show-orders-canceled');

        $status = OrderStatus::where('name', 'canceled')->first();
        $orders = Order::where('status_id', $status->id)->orderBy('id','desc')->paginate(5);

        return view('Admin.Order.canceled',[
            'orders' => $orders
        ]);

    }

    public function show(Order $order)
    {
        Gate::authorize('show-single-order');

        return view('Admin.Order.show',[
            'order' => $order
        ]);
    }


    public function update(Request $request, Order $order)
    {
        Gate::authorize('edit-order');

        $request->validate([
            'status_id' => 'required|integer|between:2,3'
        ]);


        $order->status_id = $request->status_id;
        $order->save();

        return [
            'success' => __('notifications.edit-order-status')
        ];
    }

}
