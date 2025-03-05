<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Flights\Domain\Actions;

use Lightit\Backoffice\Flights\Domain\DataTransferObjects\FlightDto;
use Lightit\Backoffice\Flights\Domain\Models\Flight;

class UpdateFlightAction
{
    public function execute(Flight $flight, FlightDto $flightDto): Flight
    {
        $flight->update([
            'airline' => $flightDto->getAirline(),
            'departure_city' => $flightDto->getDepartureCity(),
            'arrival_city' => $flightDto->getArrivalCity(),
        ]);

        return $flight;
    }
}
