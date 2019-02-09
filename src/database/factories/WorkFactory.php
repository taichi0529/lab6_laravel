<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Work::class, function (Faker $faker) {
    return [
        'title' => 'お仕事',
        'owner_id' => function() {
            return factory(App\Models\User::class)->create()->id;
        },
        'reward' => $faker->randomElement([10000, 15000, 18000, 20000, 25000]),
        'entry_end_at' => $faker->dateTimeBetween('now', '+ 7 days'),
        'description' => $faker->text,
    ];
});
