<?php

declare(strict_types=1);

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Lightit\Backoffice\Flights\Domain\Models\Flight;
use Lightit\Backoffice\Cities\Domain\Models\City;
use Lightit\Backoffice\Airlines\Domain\Models\Airline;

/** @extends Factory<Flight> */
class FlightFactory extends Factory
{
    protected $model = Flight::class;

    public function definition(): array
    {
        return [
            'airline_id' => AirlineFactory::new()->create(),
            'departure_city_id' => CityFactory::new()->create(),
            'arrival_city_id' => CityFactory::new()->create(),
            'departure_date' => $this->faker->dateTimeBetween('now', '+1 month'),
            'arrival_date' => $this->faker->dateTimeBetween('+1 month', '+2 months'),
        ];
    }
}
