<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Cities\Domain\DataTransferObjects;

class CityDto
{
    public function __construct(
        private readonly string $name,
        private readonly int $number_of_incoming_flights,
        private readonly int $number_of_outgoing_flights,
    ) {
    }
   
    public function getName(): string
    {
        return $this->name;
    }

    public function getNumberOfIncomingFlights(): int
    {
        return $this->number_of_incoming_flights;
    }

    public function getNumberOfOutgoingFlights(): int
    {
        return $this->number_of_outgoing_flights;
    }
}
