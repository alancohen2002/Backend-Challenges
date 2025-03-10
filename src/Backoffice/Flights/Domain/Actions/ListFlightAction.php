<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Flights\Domain\Actions;

use Illuminate\Contracts\Pagination\Paginator;
use Lightit\Backoffice\Flights\Domain\Models\Flight;

class ListFlightAction
{
    /**
     * @return Paginator<Flight>
     */
    public function execute(): Paginator
    {
        return Flight::with(['airline', 'departureCity', 'arrivalCity'])
        ->paginate(10);
    }
}
