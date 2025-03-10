<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Flights\Domain\Actions;

use Lightit\Backoffice\Airlines\Domain\Models\Airline;
use Lightit\Backoffice\Cities\Domain\Models\City;
use Lightit\Backoffice\Flights\Domain\DataTransferObjects\FlightDto;
use Lightit\Backoffice\Flights\Domain\Models\Flight;

class StoreFlightAction
{
    public function execute(FlightDto $flightDto): Flight
    {
        $airline = Airline::findOrFail($flightDto->getAirline());
        $departureCity = City::findOrFail($flightDto->getDepartureCity());
        $arrivalCity = City::findOrFail($flightDto->getArrivalCity());

        if (! $airline->cities->contains($departureCity)) {
            throw new \Exception('The airline does not operate in the departure city');
        }
    
        if (! $airline->cities->contains($arrivalCity)) {
            throw new \Exception('The airline does not operate in the arrival city');
        }

        $flight = Flight::create([
            'airline_id' => $flightDto->getAirline(),
            'departure_city_id' => $flightDto->getDepartureCity(),
            'arrival_city_id' => $flightDto->getArrivalCity(),
            'departure_date' => $flightDto->getDepartureDate(),
            'arrival_date' => $flightDto->getArrivalDate(),
        ]);
        
        $flight->airline->increment('number_of_flights');
        $flight->departureCity->increment('number_of_outgoing_flights');
        $flight->arrivalCity->increment('number_of_incoming_flights');
        
        return $flight;
    }
}
