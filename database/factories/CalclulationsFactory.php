<?php

use Faker\Generator as Faker;



$factory->define(App\Calculation::class, function (Faker $faker) {
    $person = array('id' => 1, 'name' => 'Test');
    return [
        'name' => 'testName',
        'user_name' => 'test_user_name',
        'user_email' => "test@test.test",
        'user_phone' => 111111111111,
        'cost_per_hour' => 2,
        'template_id' => 24,
        'tasks' => json_encode($person),
        'additional_tasks' => json_encode($person),
        'info' => json_encode($person),
        'stages' => json_encode($person),
        'problem' => 'test_problem',
        'task' => 'test_task',
        'target' => 'test_target'
    ];
});
