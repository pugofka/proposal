<?php

use Faker\Generator as Faker;



$factory->define(App\Task::class, function (Faker $faker) {
    return [
        'name' => 'testName',
        'stage_id' => 1,
    ];
});
