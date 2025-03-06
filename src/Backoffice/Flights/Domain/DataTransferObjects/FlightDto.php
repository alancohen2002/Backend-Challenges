<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Flights\Domain\DataTransferObjects;

class FlightDto
{
    public function __construct(
        private readonly int $airline,
        private readonly int $departure_city,
        private readonly int $arrival_city,
    ) {
    }
   
    public function getAirline(): int
    {
        return $this->airline;
    }

    public function getDepartureCity(): int
    {
        return $this->departure_city;
    }

    public function getArrivalCity(): int
    {
        return $this->arrival_city;
    }
}
