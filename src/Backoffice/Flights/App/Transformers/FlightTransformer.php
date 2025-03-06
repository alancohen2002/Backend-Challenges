<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Flights\App\Transformers;

use Flugg\Responder\Transformers\Transformer;
use Lightit\Backoffice\Cities\Domain\Models\City;
use Lightit\Backoffice\Flights\Domain\Models\Flight;

class FlightTransformer extends Transformer
{
    /**
     * @return array{id: int, airline: string, departure_city: string, arrival_city: string}
     */
    public function transform(Flight $flight): array
    {
        $departure_city = City::find($flight->departure_city_id);
        $arrival_city = City::find($flight->arrival_city_id);

        return [
            'id' => $flight->id,
            'airline' => $flight->airline->name,
            'departure_city' => $departure_city ? $departure_city->name : 'Unknown',
            'arrival_city' => $arrival_city ? $arrival_city->name : 'Unknown',
        ];
    }
}
