<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {

        $products = Product::orderBy('id', 'desc')->limit(7)->get();
        return view('Home.home', [
            'products' => $products
        ]);
    }

    public function products()
    {
        $products = Product::orderBy('id','desc')->paginate(12);
        return view("Home.shop",[
            'products' => $products
        ]);
    }

    public function showProduct(Product $product)
    {
        return view('Home.product-details', [
            'product' => $product
        ]);
    }

}
