<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Cities\Domain\DataTransferObjects;

class SortQueryDto
{
    public function __construct(
        private readonly bool $sortByName,
        private readonly bool $sortById,
        private readonly int $sortByAirlineId,
        private readonly string $sortDirection,
    ) {
    }
   
    public function getSortByName(): bool
    {
        return $this->sortByName;
    }

    public function getSortById(): bool
    {
        return $this->sortById;
    }

    public function getSortByAirlineId(): int
    {
        return $this->sortByAirlineId;
    }

    public function getSortDirection(): string
    {
        return $this->sortDirection;
    }
}
