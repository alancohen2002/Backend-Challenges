<?php

declare(strict_types=1);

namespace Tests\RequestFactories;

use Worksome\RequestFactories\RequestFactory;

class StoreFlightRequestFactory extends RequestFactory
{
    public function definition(): array
    {
        return [
            'airline_id' => StoreAirlineRequestFactory::new()->create(),
            'departure_city_id' => StoreCityRequestFactory::new()->create(),
            'arrival_city_id' => StoreCityRequestFactory::new()->create(),
            'departure_date' => $this->faker->dateTimeBetween('now', '+1 month'),
            'arrival_date' => $this->faker->dateTimeBetween('+1 month', '+2 months'),
        ];
    }
}
