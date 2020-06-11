<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ProductController extends Controller
{

    public function index()
    {
        Gate::authorize('show-products');

        $products = Product::orderBy('id', 'desc')->paginate(3);

        return view('Admin.Product.index', [
            'products' => $products
        ]);
    }

    public function create()
    {
        Gate::authorize('add-product');

        $categories = Category::all();
        return view('Admin.Product.create', [
            'categories' => $categories
        ]);
    }

    public function store(Request $request)
    {
        Gate::authorize('add-product');

        $request->validate([
            'name' => 'required|string|min:3',
            'price' => 'required|numeric|min:1',
            'categories' => 'required|not_in:0',
            'description' => 'required|min:10',
            'images' => 'image'
        ], [
            'images.image' => 'Product Image Must be an Image (Not File)'
        ]);

        $product = Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description
        ]);

        $product->categories()->attach($request->categories);

        if ($request->hasFile('images')) {
            $file = $request->file('images');
            $file_name = $request->name . '.' . $file->getClientOriginalExtension();
            $product->image = $file_name;
            if ($product->save()) {
                self::generate_url($file, $file_name);
            }
        } else {
            $product->image = 'default.png';
            $product->save();
        }

        return back()->with([
            'success' => __('notifications.add-product')
        ]);
    }

    public function show(Product $product)
    {
        Gate::authorize('show-product');

    }

    public function edit(Product $product)
    {
        Gate::authorize('edit-product');

        $categories = Category::all();
        return view('Admin.Product.edit', [
            'product' => $product,
            'categories' => $categories
        ]);
    }

    public function update(Request $request, Product $product)
    {
        Gate::authorize('edit-product');

        $request->validate([
            'name' => 'required|string|min:3',
            'price' => 'required|numeric|min:1',
            'categories' => 'required|not_in:0',
            'description' => 'required|min:10',
            'images' => 'image'
        ], [
            'images.image' => 'Product Image Must be an Image (Not File)'
        ]);

        $product->update([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description
        ]);

        $product->categories()->sync($request->categories);

        if ($request->hasFile('images')) {
            $file = $request->file('images');
            $file_name = $request->name . '.' . $file->getClientOriginalExtension();
            $product->image = $file_name;
            if ($product->save()) {
                self::generate_url($file, $file_name);
            }
        }

        return back()->with([
            'success' => __('notifications.update-product')
        ]);
    }

    public function destroy(Product $product)
    {
        Gate::authorize('delete-product');

        $product->delete();

        return back()->with([
            'success' => __('notifications.delete-product')
        ]);
    }

    private static function generate_url($file, $file_name)
    {
        $path = public_path('images/products');
        $file->move($path, $file_name);
    }
}
