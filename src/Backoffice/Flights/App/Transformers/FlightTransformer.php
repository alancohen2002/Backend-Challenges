<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Flights\App\Transformers;

use Carbon\Carbon;
use Flugg\Responder\Transformers\Transformer;
use Lightit\Backoffice\Cities\Domain\Models\City;
use Lightit\Backoffice\Flights\Domain\Models\Flight;

class FlightTransformer extends Transformer
{
    /**
     * @return array{id: int, airline: string, departure_city: string, arrival_city: string, departure_date: string, arrival_date: string}
     */
    public function transform(Flight $flight): array
    {
        $flight = Flight::with(['departureCity', 'arrivalCity', 'airline'])->findOrFail($flight->id);

        return [
            'id' => $flight->id,
            'airline' => $flight->airline->name,
            'departure_city' => $flight->departureCity->name,
            'arrival_city' => $flight->arrivalCity->name,
            'departure_date' => Carbon::parse($flight->departure_date)->format('Y-m-d H:i:s'),
            'arrival_date' => Carbon::parse($flight->arrival_date)->format('Y-m-d H:i:s'),
        ];
    }
}
