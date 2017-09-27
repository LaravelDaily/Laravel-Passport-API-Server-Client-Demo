<?php

$factory->define(App\Project::class, function (Faker\Generator $faker) {
    return [
        "title" => $faker->name,
        "description" => $faker->name,
    ];
});
