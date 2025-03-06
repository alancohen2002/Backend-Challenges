<?php

declare(strict_types=1);

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Lightit\Backoffice\Cities\Domain\Models\City;


/** @extends Factory<City> */
class CityFactory extends Factory
{
    protected $model = City::class;

    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'number_of_incoming_flights' => $this->faker->numberBetween(0, 100),
            'number_of_outgoing_flights' => $this->faker->numberBetween(0, 100),
        ];
    }
}
