<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
namespace App;

use App\Category;

use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Category::class, function (Faker $faker) {
    $title = $faker->sentence(2);
    $slug = Str::of($title)->slug('-');
    return [
        'title' => $title,
        'slug' => $slug,
    ];
});
