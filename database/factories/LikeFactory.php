<?php

use Faker\Generator as Faker;
//También puede adjuntar relaciones a modelos utilizando los atributos de Cierre en las definiciones de fábrica. Por ejemplo, si desea crear una nueva instancia de usuario al crear una publicación,


$factory->define(App\Like::class, function (Faker $faker) {
  $user = App\User::doesntHave('likes')
          ->inRandomOrder()
          ->first();
    return [
        'musiclist_id' => $faker->numberBetween(2,50),
        'user_id' => $user->id

    ];
});
