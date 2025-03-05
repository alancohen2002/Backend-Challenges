<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Lightit\Backoffice\Cities\Domain\Models\City;


class CitySeeder extends Seeder
{
    public function run(): void
    {
        City::factory()->count(50)->create(); 
    }
}
