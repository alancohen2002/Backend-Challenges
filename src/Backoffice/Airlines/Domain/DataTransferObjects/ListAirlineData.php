<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Airlines\Domain\DataTransferObjects;

class ListAirlineData
{
    public function __construct(
        public int|null $numberOfActiveFlights,
        public int|null $cityId,
        public string|null $sortDirection,
    ) {
    }
}
