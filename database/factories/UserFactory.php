<?php

use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    $input = ['Masculino', 'Feminino'];
    shuffle($input);
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => Str::random(10),
        'genre' => $input[0],
        'document' => $faker->numerify('###########'),
        'date_of_birth' => $faker->date(),
        'cover' => $faker->imageUrl(),
        'zipcode' => $faker->postcode,
        'street' => $faker->streetName,
        'number' => $faker->buildingNumber,
        'complement' => $faker->secondaryAddress,
        'neighborhood' => $faker->streetAddress,
        'state' => $faker->state,
        'city' => $faker->city,
        'telephone'=> $faker->phoneNumber,
        'cell' => $faker->phoneNumber,
        'admin' => $faker->boolean,
        'client'=> $faker->boolean,
    ];
});