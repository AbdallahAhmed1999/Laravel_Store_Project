<?php

use App\Category;
use App\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        factory(Product::class, 50)->create()->each(function ($product){
            $categories = Category::all()->random(3);
            $product->categories()->sync($categories);
        });
    }
}
