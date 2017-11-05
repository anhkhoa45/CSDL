<?php

use Faker\Generator as Faker;

/* @var Illuminate\Database\Eloquent\Factory $factory */

$factory->define(\App\Course::class, function (Faker $faker) {
    $user_ids = DB::table('users')->select('id')->get();

    return [
            'name'          => $faker->realText(20),
            'description'   => $faker->realText(300),
            'cost'          => rand(10, 200),
            'status'        => 'public',
            'teacher_id'    => $user_ids[rand(1, count($user_ids) - 1)]->id,
            'created_at'     => date('Y-m-d H:i:s'),
            'updated_at'    => date('Y-m-d H:i:s'),
    ];
});
