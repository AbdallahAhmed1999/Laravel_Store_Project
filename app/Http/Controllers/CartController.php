<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Support\Facades\Cookie;
use Eastwest\Json\Json;

class CartController extends Controller
{
    public function index()
    {
        $products = Cookie::get('cart');
        $products = json_decode($products);

        return view('Home.cart', [
            'products' => $products
        ]);
    }

    public function addProduct(Product $product)
    {
        request()->validate([
            'quantity' => "required|min:1"
        ]);

        $product->quantity = request('quantity');

        if (!Cookie::has('cart')) {
            $products = array();
            array_push($products, $product);
            $json_array = Json::encode($products);
            Cookie::queue('cart', $json_array, 60 * 24 * 7);
        } else {
            $products = Cookie::get('cart');
            $products = Json::decode($products);
            array_push($products, $product);
            $json_array = Json::encode($products);
            Cookie::queue('cart', $json_array, 60 * 24 * 7);
        }

        return redirect('/shop')->with([
            'success' => __('notifications.cart-add-product')
        ]);
    }

    public function delete(Product $product)
    {
        $products = Cookie::get('cart');
        $products = Json::decode($products);

        foreach ($products as $key => $value) {
            if ($value->id == $product->id) {
                unset($products[$key]);
            }
        }

        $products = array_values($products);

        $products = Json::encode($products);
        Cookie::queue('cart', $products, 60 * 24 * 7);


        return back()->with([
            'success' => __('notifications.cart-remove-product')
        ]);
    }

}
