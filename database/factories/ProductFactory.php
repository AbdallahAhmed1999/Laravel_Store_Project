<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->text(10),
        'description' => $faker->paragraph,
        'image' => 'default.png',
        'price' => $faker->randomFloat(1,1,2000)
    ];
});
