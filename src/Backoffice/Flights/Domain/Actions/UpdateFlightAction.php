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
            'airline_id' => $flightDto->getAirline(),
            'departure_city_id' => $flightDto->getDepartureCity(),
            'arrival_city_id' => $flightDto->getArrivalCity(),
            'departure_date' => $flightDto->getDepartureDate(),
            'arrival_date' => $flightDto->getArrivalDate(),
        ]);

        return $flight;
    }
}
