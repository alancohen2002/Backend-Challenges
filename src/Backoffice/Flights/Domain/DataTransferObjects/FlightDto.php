<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Flights\Domain\DataTransferObjects;

use Carbon\Carbon;

class FlightDto
{
    public function __construct(
        private readonly int $airline,
        private readonly int $departure_city,
        private readonly int $arrival_city,
        private readonly Carbon $departure_date,
        private readonly Carbon $arrival_date,
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

    public function getDepartureDate(): Carbon
    {
        return $this->departure_date;
    }

    public function getArrivalDate(): Carbon
    {
        return $this->arrival_date;
    }
}
