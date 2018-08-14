<?php

use Faker\Generator as Faker;

$factory->define(App\Comment::class, function (Faker $faker) {
      return [
      'musiclist_id' => $faker->numberBetween(2,50),
      'user_id'      => $faker->numberBetween(2,50),
      'description'  => $faker->text()
    ];
});
