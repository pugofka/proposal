<?php

use Faker\Generator as Faker;



$factory->define(App\Variant::class, function (Faker $faker) {
    return [
        'name' => 'testName',
        'task_id' => 1,
    ];
});
