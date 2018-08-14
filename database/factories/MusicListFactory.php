<?php

use Faker\Generator as Faker;

$factory->define(App\MusicList::class, function (Faker $faker) {
    return [
      'name'    => $faker->name,
      'photo'   => $faker->imageUrl($width = 640, $height = 480),
      'user_id' => $faker->numberBetween(2,50)
    ];
});
