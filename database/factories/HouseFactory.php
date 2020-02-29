<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\House;
use Faker\Generator as Faker;

$factory->define(House::class, function (Faker $faker) {
    return [
        'avenue'=>$faker->unique()->address,
        'number'=>$faker->buildingNumber,
        'square'=>$faker->city,
        'long'=>$faker->longitude,
        'lat'=>$faker->latitude,
        'pieces'=>$faker->numberBetween(1,10),
        'price'=>$faker->numberBetween(100000,1000000),
        'picture'=>$faker->imageUrl(),
        'description'=>$faker->text('200'),
        'status_id'=>$faker->numberBetween(1,2),
        'user_id'=>1,
    ];
});
