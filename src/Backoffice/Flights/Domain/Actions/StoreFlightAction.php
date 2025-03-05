<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Flights\Domain\Actions;

use Lightit\Backoffice\Flights\Domain\DataTransferObjects\FlightDto;
use Lightit\Backoffice\Flights\Domain\Models\Flight;

class StoreFlightAction
{
    public function execute(FlightDto $flightDto): Flight
    {
        return Flight::create([
            'airline' => $flightDto->getAirline(),
            'departure_city' => $flightDto->getDepartureCity(),
            'arrival_city' => $flightDto->getArrivalCity(),
        ]);
    }
}
