<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Domain\Models\Sanctuary;
use App\Domain\Services\PostcodeLookup;
use Faker\Generator as Faker;
use Illuminate\Support\Arr;

$factory->define(Sanctuary::class, function (Faker $faker) {
    $locations = [
        ['town' => 'Hull', 'postcode' => 'HU1 1AA'],
        ['town' => 'Kent', 'postcode' => 'CT16 1AA'],
        ['town' => 'Keyingham', 'postcode' => 'HU12 9BQ'],
        ['town' => 'Nottingham', 'postcode' => 'NG1 1AB'],
        ['town' => 'Cottingham', 'postcode' => 'HU16 4AA'],
        ['town' => 'Beverley', 'postcode' => 'HU11 5WB'],
        ['town' => 'Whitby', 'postcode' => 'YO21 1AD'],
        ['town' => 'South Cave', 'postcode' => 'HU15 1ZA'],
        ['town' => 'Evasham', 'postcode' => 'WR11 1AB'],
    ];

    $location = Arr::random($locations);
    $latLong = PostcodeLookup::make($location['postcode'])->getLatLong();

    return [
        'name' => $faker->city . ' ' . Arr::random(['Sanctuary', 'Haven', 'Rescue']),
        'description' => $faker->text,
        'address' => $faker->address,
        'town' => $location['town'],
        'postcode' => $location['postcode'],
        'lat' => $latLong['lat'],
        'lng' => $latLong['lng'],
        'contact_information' => $faker->text,
        'social_media' => [
            'facebook' => null,
            'instagram' => null,
        ],
        'volunteering' => Arr::random([1, 0, null]),
        'open_for_intake' => Arr::random([1, 0, null]),
        'vegan' => Arr::random([1, 0, null]),
    ];
});
