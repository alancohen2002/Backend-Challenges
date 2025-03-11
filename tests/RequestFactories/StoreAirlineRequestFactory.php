<?php

declare(strict_types=1);

namespace Tests\RequestFactories;

use Worksome\RequestFactories\RequestFactory;

class StoreAirlineRequestFactory extends RequestFactory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->company,
            'description' => $this->faker->company,
        ];
    }
}
