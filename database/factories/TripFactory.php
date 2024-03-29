<?php

namespace Database\Factories;

use App\Models\Trip;
use Illuminate\Database\Eloquent\Factories\Factory;

class TripFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Trip::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $departureCity = 'Paris';
        $arrivalCity = 'Lille';
        $departureDate = $this->faker->dateTimeBetween('- 5 hours', '+ 1 day');

        return [
            'departure_city' => $departureCity,
            'departure_zip_code' => $this->faker->postcode,
            'departure_address' => $this->faker->streetAddress,
            'arrival_city' => $arrivalCity,
            'arrival_zip_code' => $this->faker->postcode,
            'arrival_address' => $this->faker->streetAddress,
            'departure_date' => $departureDate,
            'duration' => $this->faker->numberBetween(1000, 100000),
            'meters' => $this->faker->numberBetween(1000, 100000),
            'price' => $this->faker->numberBetween(100, 10000),
            'description' => $this->faker->realText(200),
            'number_of_seats' => $this->faker->numberBetween(1, 7),
            'status' => 'planned',
            'unique_key' => substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789"), 10, 30),
        ];
    }
}
