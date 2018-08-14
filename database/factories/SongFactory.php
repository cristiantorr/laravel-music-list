<?php

use Faker\Generator as Faker;

$factory->define(App\Song::class, function (Faker $faker) {
  // $faker = \Faker\Factory::create();
  // $faker->addProvider(new Faker\Provider\Youtube($faker));

  $song = ['https://www.youtube.com/embed/JFAcOnhcpGA','https://www.youtube.com/embed/o_l4Ab5FRwM','https://www.youtube.com/embed/F_JF8oSxXtM'];
      return [
        'name'         => $faker->sentence(3, false),
        'artist'       => $faker->sentence(2, false),
        'youtube_url'  => $faker->randomElement($song),
        'musiclist_id' => $faker->numberBetween(2, 50)
      ];
});
