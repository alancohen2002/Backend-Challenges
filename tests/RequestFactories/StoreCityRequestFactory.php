<?php

declare(strict_types=1);

namespace Tests\RequestFactories;

use Worksome\RequestFactories\RequestFactory;

class StoreCityRequestFactory extends RequestFactory
{
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'number_of_incoming_flights' => $this->faker->numberBetween(0, 100),
            'number_of_outgoing_flights' => $this->faker->numberBetween(0, 100),
        ];
    }
}
