<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Estacionamiento::class, function (Faker $faker) {
    return [
        'lugar'=> $faker-> streetAddress,
    ];
});
