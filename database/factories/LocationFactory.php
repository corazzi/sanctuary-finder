<?php

namespace Database\Factories;

use App\Models\Location;
use App\Models\Postcode;
use Faker\Provider\en_GB\Address as UKAddress;
use Faker\Provider\en_GB\PhoneNumber as UKPhoneNumber;
use Illuminate\Database\Eloquent\Factories\Factory;

class LocationFactory extends Factory
{
    protected $model = Location::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $this->faker->addProvider(new UKAddress($this->faker));
        $this->faker->addProvider(new UKPhoneNumber($this->faker));

        $postcode = Postcode::query()
            ->inRandomOrder()
            ->whereNotNull(['latitude', 'longitude'])
            ->first();

        return [
            'address_line_1' => $this->faker->streetAddress,
            'address_line_2' => $this->faker->streetName,
            'town' => $this->faker->city,
            'postcode' => $postcode['postcode'],
            'latitude' => $postcode['latitude'],
            'longitude' => $postcode['longitude'],
            'telephone' => $this->faker->phoneNumber,
            'opening_times_info' => $this->faker->randomElement(['', $this->faker->paragraphs(1, true)]),
            'opening_times' => [
                'monday' => ['09:00-17:00'],
                'tuesday' => ['09:00-17:00'],
                'wednesday' => [],
                'thursday' => ['09:00-17:00'],
                'friday' => ['09:00-17:00'],
                'saturday' => ['09:00-17:00'],
                'sunday' => [],
            ],
        ];
    }
}
