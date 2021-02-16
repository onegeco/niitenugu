<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Scholarship;
use App\Models\ScholarshipAttendee;
use Faker\Generator as Faker;

$factory->define(ScholarshipAttendee::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'phone' => $faker->phoneNumber,
        'scholarship_id' => Scholarship::inRandomOrder()->first('uid')->uid,
        'city' => $faker->city,
        'invitation_code' => strtoupper(str_random(3) . '-' . mt_rand(1000, 9999) . '-' . str_random(2)),
        'uid' => uniqid(true),
    ];
});
