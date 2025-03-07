<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Airlines\Domain\Actions;

use Carbon\Carbon;
use Illuminate\Contracts\Pagination\Paginator;
use Lightit\Backoffice\Airlines\Domain\DataTransferObjects\ListAirlineData;
use Lightit\Backoffice\Airlines\Domain\Models\Airline;

class ListAirlineAction
{
    /**
     * @return Paginator<Airline>
     */
    public function execute(ListAirlineData $requestData): Paginator
    {
        $numberOfActiveFlights = $requestData->numberOfActiveFlights;
        $cityId = $requestData->cityId;
        $query = Airline::query();

        if ($numberOfActiveFlights !== null) {
            $query->join('flights', 'airlines.id', '=', 'flights.airline_id')
                ->where('flights.departure_date', '<', Carbon::now())
                ->where('flights.arrival_date', '>', Carbon::now())
                ->groupBy('airlines.id')
                ->havingRaw('COUNT(*) >= ?', [$numberOfActiveFlights])
                ->select('airlines.*');
        }

        if ($cityId != null) {
            $query->whereHas('flights', function ($flights) use ($cityId) {
                $flights->where('flights.departure_date', '<', Carbon::now())
                        ->where('flights.arrival_date', '>', Carbon::now())
                        ->where(function ($query) use ($cityId) {
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
