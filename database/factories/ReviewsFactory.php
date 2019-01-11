<?php

use Faker\Generator as Faker;



$factory->define(App\Reviews::class, function (Faker $faker) {
    return [
        'name' => 'testName',
        'image' => '/sad/sadas/asdas/sad.jpg',
        'active' => '1',
        'sort' => 1
    ];
});
