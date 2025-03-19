<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Cities\Domain\DataTransferObjects;

use Lightit\Shared\App\Enums\OrderDirectionEnum;

class ListCityData
{
    public function __construct(
        public string|null $sortBy,
        public int|null $airlineId,
        public OrderDirectionEnum|null $orderDirection,
    ) {
    }
}
