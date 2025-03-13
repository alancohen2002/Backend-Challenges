<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Airlines\Domain\DataTransferObjects;

use Lightit\Shared\App\Enums\OrderDirectionEnum;

class ListAirlineData
{
    public function __construct(
        public int|null $number_of_active_flights,
        public int|null $city_id,
        public OrderDirectionEnum|null $order_direction,
    ) {
    }
}
