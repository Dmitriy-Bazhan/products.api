<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    static $id = 1;
    return [
        'name' => 'product_' . $id++,
        'price' => rand(100, 1000),
        'image' => 'image_product_' . $id++  . '.jpg',
    ];
});
