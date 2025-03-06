<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Airlines\Domain\DataTransferObjects;

class SortQueryDto
{
    public function __construct(
        private readonly bool $sortByNumberOfActiveFlights,
        private readonly int $sortByCityId,
        private readonly string $sortDirection,
    ) {
    }
   
    public function getSortByNumberOfActiveFlights(): bool
    {
        return $this->sortByNumberOfActiveFlights;
    }

    public function getSortByCityId(): int
    {
        return $this->sortByCityId;
    }

    public function getSortDirection(): string
    {
        return $this->sortDirection;
    }
}
