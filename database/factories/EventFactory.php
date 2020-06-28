<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Event;
use App\Model;
use Faker\Generator as Faker;

$factory->define(Event::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->sentence,
        'event_image' => $faker->imageUrl('600', '300'),
        'date_start' => $faker->dateTimeBetween($startDate = '-1year', $endDate = 'now', $timezone = null),
        'date_stop' => $faker->dateTimeBetween($startDate = 'now', $endDate = '+2year', $timezone = null),
    
    ];
});
