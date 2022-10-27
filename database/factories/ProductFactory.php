<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use App\SubCategory;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'sub_category_id' => function () {
            return SubCategory::inRandomOrder()->first()->id;
        },
        'name'          => $faker->name,
        'info'          => $faker->sentence,
        'description'   => $faker->paragraph(8),
        'weight'        => (string) rand(1, 150),
        'outstanding'   => rand(0,1)
    ];
});
