<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Lightit\Backoffice\Airlines\Domain\Models\Airline;

class AirlineSeeder extends Seeder
{
    public function run(): void
    {
        Airline::factory()->count(50)->create(); 
    }
}
