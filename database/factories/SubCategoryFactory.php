<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use App\Category;
use App\SubCategory;
use Faker\Generator as Faker;

$factory->define(SubCategory::class, function (Faker $faker) {
    return [
        'category_id' => function () {
            return Category::inRandomOrder()->first()->id;
        },
        'name' => $faker->name,
        'image' => 'images/sub-categories/Imagen_356.png'
    ];
});
