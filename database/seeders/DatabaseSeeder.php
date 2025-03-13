<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Factories\AirlineFactory;
use Database\Factories\CityFactory;
use Database\Factories\FlightFactory;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $cities = CityFactory::new()->count(5)->create();

        AirlineFactory::new()
            ->count(10)
            ->recycle($cities)
            ->withCities(4)
            ->create();

        FlightFactory::new()->count(5)->create();
    }
}
