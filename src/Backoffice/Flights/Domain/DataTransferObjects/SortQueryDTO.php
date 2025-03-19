<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Flights\Domain\DataTransferObjects;

class SortQueryDto
{
    public function __construct(
        private readonly bool $sortByName,
        private readonly string $sortDirection,
    ) {
    }
   
    public function getSortByName(): bool
    {
        return $this->sortByName;
    }

    public function getSortDirection(): string
    {
        return $this->sortDirection;
    }
}
