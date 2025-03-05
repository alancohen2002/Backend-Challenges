<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Flights\Domain\DataTransferObjects;

class FlightDto
{
    public function __construct(
        private readonly string $airline,
        private readonly string $departure_city,
        private readonly string $arrival_city,
    ) {
    }
   
    public function getAirline(): string
    {
        return $this->airline;
    }

    public function getDepartureCity(): string
    {
        return $this->departure_city;
    }

    public function getArrivalCity(): string
    {
        return $this->arrival_city;
    }
}
