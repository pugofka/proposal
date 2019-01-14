<?php

use Faker\Generator as Faker;



$factory->define(App\Stage::class, function (Faker $faker) {
    return [
        'name' => 'testName',
        'active' => '1',
        'sort' => 1
    ];
});
