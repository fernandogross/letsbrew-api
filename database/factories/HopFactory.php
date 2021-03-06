<?php
/** @var Factory $factory */

use App\Models\Hop;
use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Hop::class, function (Faker $faker) {
    return [
        'user_id' => function () {
            return factory(User::class)->create()->id;
        },
        'name' => $faker->name,
        'origin' => $faker->country,
        'price' => $faker->numberBetween(1, 99),
        'type' => $faker->randomElement(array_values(Hop::HOP_TYPES)),
        'form' => $faker->randomElement(array_values(Hop::HOP_FORMS)),
        'alpha' => $faker->numberBetween(10, 15),
        'beta' => $faker->numberBetween(5, 15),
        'characteristics' => $faker->text,
    ];
});