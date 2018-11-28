<?php
use App\model\product;
use Faker\Generator as Faker;

$factory->define(App\model\review::class, function (Faker $faker) {
    return [
        'product_id'    => function () {
        return product::all()->random();
        },
        'customer'      => $faker->word,
        'review'        => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        'star'          =>$faker->numberBetween($min = 1, $max = 5)
    ];
});
