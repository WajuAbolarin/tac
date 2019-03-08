<?php

use Faker\Generator as Faker;

$factory->define(App\Attendee::class, function (Faker $faker) {
    return [
        'fullname' => $faker->name(),
        'email' => $faker->safeEmail(),
        'phone'  => $faker->phoneNumber(),
        'address'  => $faker->address(),
        'assembly'  => $faker->city(),
        'gender'  => $faker->randomElement(['male', 'female']),
        'age'  => $faker->randomElement(['12-20yrs', '21-30yrs', '31-40yrs']),
        'role_id' => 1,
        // 'photo_url' => $faker->imageUrl()
    ];
});
