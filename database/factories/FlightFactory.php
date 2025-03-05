<?php

declare(strict_types=1);

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Lightit\Backoffice\Flights\Domain\Models\Flight;
use Lightit\Backoffice\Cities\Domain\Models\City;
use Lightit\Backoffice\Airlines\Domain\Models\Airline;

class FlightFactory extends Factory
{
    protected $model = Flight::class;

    public function definition(): array
    {
        return [
            'airline_id' => Airline::factory(),
            'departure_city_id' => City::factory(),
            'arrival_city_id' => City::factory(),
            'departure_time' => $this->faker->dateTimeBetween('now', '+1 month'),
            'arrival_time' => $this->faker->dateTimeBetween('+1 month', '+2 months'),
            'price' => $this->faker->randomFloat(2, 100, 1500),
        ];
    }
}
