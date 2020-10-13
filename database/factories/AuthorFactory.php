<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Author;
use Faker\Generator as Faker;
use Carbon\Carbon;

$factory->define(Author::class, function (Faker $faker) {
    return [
        'name'=>$faker->name,
        'dob'=>Carbon::now()->subYears(10),
    ];
});
