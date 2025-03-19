<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Airlines\Domain\Actions;

use Lightit\Backoffice\Airlines\Domain\DataTransferObjects\AirlineDto;
use Lightit\Backoffice\Airlines\Domain\Models\Airline;

class StoreAirlineAction
{
    public function execute(AirlineDto $airlineDto): Airline
    {
        $airline = Airline::create([
            'name' => $airlineDto->getName(),
            'description' => $airlineDto->getDescription(),
            'number_of_flights' => $airlineDto->getNumberOfFlights(),
        ]);

        $airline->cities()->attach($airlineDto->getEnabledCities());

        return $airline;
    }
}
