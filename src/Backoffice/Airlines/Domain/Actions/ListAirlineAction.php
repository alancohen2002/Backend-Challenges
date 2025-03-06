<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Airlines\Domain\Actions;

use Illuminate\Contracts\Pagination\Paginator;
use Lightit\Backoffice\Airlines\Domain\DataTransferObjects\SortQueryDto;
use Lightit\Backoffice\Airlines\Domain\Models\Airline;

class ListAirlineAction
{
    /**
     * @return Paginator<Airline>
     */
    public function execute(SortQueryDto $request): Paginator
    {
        $sortByNumberOfActiveFlights = $request->getSortByNumberOfActiveFlights();
        $cityId = $request->getSortByCityId();
        $request->getSortDirection();

        $query = Airline::query();

        if ($sortByNumberOfActiveFlights) {
            $query->whereHas('flights', function ($q) {
                $q->where('departure_date', '<', now())
                  ->where('arrival_date', '>', now());
            });
        }

        

        if ($cityId) {
            $query->whereHas('flights', function ($flights) use ($cityId) {
                $flights->where(function ($query) use ($cityId) {
                    $query->whereHas('departureCity', function ($departureCity) use ($cityId) {
                        $departureCity->where('id', '=', $cityId);
                    })
                    ->orWhereHas('arrivalCity', function ($arrivalCity) use ($cityId) {
                        $arrivalCity->where('id', '=', $cityId);
                    });
                });
            });
        }

        return $query->simplePaginate(10);
    }
}
