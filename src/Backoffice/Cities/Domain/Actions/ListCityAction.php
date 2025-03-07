<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Cities\Domain\Actions;

use Illuminate\Contracts\Pagination\Paginator;
use Lightit\Backoffice\Cities\Domain\DataTransferObjects\ListCityData;
use Lightit\Backoffice\Cities\Domain\Models\City;

class ListCityAction
{
    /**
     * @return Paginator<City>
     */
    public function execute(ListCityData $requestData): Paginator
    {
        $sortBy = $requestData->sortBy;
        $airlineId = $requestData->airlineId;
        $sortDirection = ! empty($requestData->sortDirection) ? $requestData->sortDirection : 'asc';

        $query = City::query();

        if ($sortBy != null) {
            $query->orderBy($sortBy, $sortDirection);
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
