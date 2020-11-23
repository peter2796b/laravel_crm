<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Client;
use Faker\Generator as Faker;
use Illuminate\Http\UploadedFile;

$factory->define(Client::class, function (Faker $faker) {

    $file = UploadedFile::fake()->image('avatar.jpg');
    $extension = $file->getClientOriginalExtension();
    $fileNameToStore = $faker->firstName . '.' . $extension;
    $path = $file->storeAs('clients/avatars', $fileNameToStore);

    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'avatar' => $fileNameToStore,
        'avatar_path' => $path
    ];
});
