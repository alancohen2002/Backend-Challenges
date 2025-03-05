<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Lightit\Backoffice\Flights\Domain\Models\Flight;

class FlightSeeder extends Seeder
{
    public function run(): void
    {
        Flight::factory()->count(50)->create(); 
    }
}
