<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Cities\Domain\Actions;

use Illuminate\Contracts\Pagination\Paginator;
use Lightit\Backoffice\Cities\Domain\DataTransferObjects\SortQueryDto;
use Lightit\Backoffice\Cities\Domain\Models\City;

class ListCityAction
{
    /**
     * @return Paginator<City>
     */
    public function execute(SortQueryDto $request): Paginator
    {
        $name = $request->getSortByName();
        $id = $request->getSortById();
        $airlineId = $request->getSortByAirlineId();
        $sortDirection = $request->getSortDirection();

        $query = City::query();

        if (! in_array(strtolower($sortDirection), ['asc', 'desc'])) {
            $sortDirection = 'asc';
        }

        if ($name) {
            $query->orderBy('name', $sortDirection);
        }

        if ($id) {
            $query->orderBy('id', $sortDirection);
        }

        if ($airlineId != null) {
            $query->whereHas('flightsAsDepartureCity', function ($query) use ($airlineId) {
                $query->where('airline_id', $airlineId);
            })
            ->orWhereHas('flightsAsArrivalCity', function ($query) use ($airlineId) {
                $query->where('airline_id', $airlineId);
            });
        }

        return $query->simplePaginate(10);
    }
}
