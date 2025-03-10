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
        $airlines = AirlineFactory::new()->count(5)->create();

        $cities = CityFactory::new()->count(5)->create();

        $airlines->each(function ($airline) use ($cities) {
            $randomCities = $cities->random(rand(1, 3));
            
            $airline->cities()->attach($randomCities);
        });

        FlightFactory::new()->count(5)->create();
    }
}
