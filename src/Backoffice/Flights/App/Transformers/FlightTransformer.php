<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Flights\App\Transformers;

use Flugg\Responder\Transformers\Transformer;
use Lightit\Backoffice\Flights\Domain\Models\Flight;

class FlightTransformer extends Transformer
{
    /**
     * @return array{id: int, airline: string, departure_city: string, arrival_city: string}
     */
    public function transform(Flight $flight): array
    {
        return [
            'id' => $flight->id,
            'airline' => $flight->airline,
            'departure_city' => $flight->departure_city,
            'arrival_city' => $flight->arrival_city,
        ];
    }
}
