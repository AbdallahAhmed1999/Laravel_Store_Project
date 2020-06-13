<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductsController extends Controller
{
    public function index(){
        return Product::all();
    }

    public function show(Product $product){
        return $product;
    }

    public function store(Request $request){
        $rules =[
            'name' => 'required|string|min:3',
            'price' => 'required|numeric|min:1',
            'categories' => 'required|not_in:0',
            'description' => 'required|min:10',
            'images' => 'image'
        ];

        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()){
            return response([
               'status' => 'error',
                'errors' => $validator->errors()
            ]);
        }

        $product = Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description
        ]);

        return response([
            'status' => 'success',
            'product' => $product
        ]);
    }

    public function update(Request $request ,Product $product){
        $product->update([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description
        ]);

        return response([
            'status' => 'updated',
            'product' => $product
        ]);
    }

    public function destroy(Product $product){
        $product->delete();
        return response([
            'status' => 'deleted',
            'product' => $product
        ]);
    }


}
