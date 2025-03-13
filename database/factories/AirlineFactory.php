<?php

declare(strict_types=1);

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Lightit\Backoffice\Airlines\Domain\Models\Airline;

/** @extends Factory<Airline> */
class AirlineFactory extends Factory
{
    protected $model = Airline::class;

    public function definition()
    {
        return [
            'name' => $this->faker->company,
            'description' => $this->faker->company,
        ];
    }

    public function withCities(int $count = 3): self
    {
        return $this->afterCreating(function (Airline $airline) use ($count) {
            $airline->cities()->attach(
                CityFactory::new()->count($count)->createMany()
            );
        });
    }
}