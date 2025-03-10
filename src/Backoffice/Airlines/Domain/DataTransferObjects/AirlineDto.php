<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Airlines\Domain\DataTransferObjects;

class AirlineDto
{
    public function __construct(
        private readonly string $name,
        private readonly string $description,
        private readonly int $number_of_flights,
        private readonly array $enabled_cities,
    ) {
    }
   
    public function getName(): string
    {
        return $this->name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getNumberOfFlights(): int
    {
        return $this->number_of_flights;
    }

    public function getEnabledCities(): array
    {
        return $this->enabled_cities;
    }
}
