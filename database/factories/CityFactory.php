<?php

declare(strict_types=1);

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<\Lightit\Shared\App\City>
 */
class CityFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'number_of_ingoing_flights' => fake()->int(),
            'number_of_outgoing_flights' => fake()->int(),
        ];
    }
}
