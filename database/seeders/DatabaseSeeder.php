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
        AirlineFactory::new()->count(5)->create();

        CityFactory::new()->count(10)->create();

        FlightFactory::new()->count(20)->create();
    }
}
