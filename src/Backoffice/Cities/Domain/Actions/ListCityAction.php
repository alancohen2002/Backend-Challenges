<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Cities\Domain\Actions;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\Paginator;
use Lightit\Backoffice\Cities\Domain\DataTransferObjects\ListCityData;
use Lightit\Backoffice\Cities\Domain\Models\City;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class ListCityAction
{
    /**
     * @return Paginator<City>
     */
    public function execute(ListCityData $requestData): Paginator
    {
        $query = QueryBuilder::for(City::class)
            ->allowedFilters([
                AllowedFilter::callback('airlineId', function (Builder $query, int $airlineId): void {
                    $query->whereHas('flightsAsDepartureCity', function (Builder $query) use ($airlineId): void {
                        $query->where('airline_id', $airlineId);
                    })->orWhereHas('flightsAsArrivalCity', function (Builder $query) use ($airlineId): void {
                        $query->where('airline_id', $airlineId);
                    });
                }),
            ])
            ->allowedSorts(['name']);

        /** @var Paginator<City> $paginator */
        $paginator = $query->simplePaginate(10);

        return $paginator;
    }
}
