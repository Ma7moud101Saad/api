<?php

use Faker\Generator as Faker;

$factory->define(App\model\product::class, function (Faker $faker) {
    return [
        'name'      => $faker->word,
        'detail'    => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        'price'     => $faker->numberBetween($min = 100, $max = 1000),
        'stock'     => $faker->randomDigit,
        'discount'  => $faker->numberBetween($min = 2, $max = 30),
        'user_id'   =>  function()
        {
            return App\User::all()->random();
        }
    ];
});
