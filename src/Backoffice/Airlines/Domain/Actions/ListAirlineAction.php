<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Airlines\Domain\Actions;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;
use Lightit\Backoffice\Airlines\Domain\DataTransferObjects\ListAirlineData;
use Lightit\Backoffice\Airlines\Domain\Models\Airline;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class ListAirlineAction
{
    /**
     * @return LengthAwarePaginator<Airline>
     */
    public function execute(ListAirlineData $requestData): LengthAwarePaginator
    {
        $query = QueryBuilder::for(Airline::class)
            ->allowedFilters([
                AllowedFilter::callback('numberOfActiveFlights', function (Builder $query, $value): void {
                    $query->join('flights', 'airlines.id', '=', 'flights.airline_id')
                        ->where('flights.departure_date', '<', Carbon::now())
                        ->where('flights.arrival_date', '>', Carbon::now())
                        ->groupBy('airlines.id')
                        ->havingRaw('COUNT(*) >= ?', [$value])
                        ->select('airlines.*');
                }),

                AllowedFilter::callback('cityId', function (Builder $query, int $value): void {
                    $query->whereHas('flights', function (Builder $flights) use ($value): void {
                        $flights->where('flights.departure_date', '<', Carbon::now())
                                ->where('flights.arrival_date', '>', Carbon::now())
                                ->where(function (Builder $query) use ($value): void {
                                    $query->whereHas(
                                        'departureCity',
                                        fn (Builder $departureCity) => $departureCity->where('id', '=', $value)
                                    )->orWhereHas(
                                        'arrivalCity',
                                        fn (Builder $arrivalCity) => $arrivalCity->where('id', '=', $value)
                                    );
                                });
                    });
                }),
            ]);
        /** @var LengthAwarePaginator<Airline> $paginator */
        $paginator = $query->paginate(100);

        return $paginator;
    }
}
