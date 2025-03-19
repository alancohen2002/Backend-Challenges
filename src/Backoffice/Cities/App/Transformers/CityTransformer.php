<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Cities\App\Transformers;

use Flugg\Responder\Transformers\Transformer;
use Lightit\Backoffice\Cities\Domain\Models\City;

class CityTransformer extends Transformer
{
    /**
     * @return array{id: int, name: string, number_of_incoming_flights: int, number_of_outgoing_flights: int}
     */
    public function transform(City $city): array
    {
        return [
            'id' => $city->id,
            'name' => $city->name,
            'number_of_incoming_flights' => $city->number_of_incoming_flights,
            'number_of_outgoing_flights' => $city->number_of_outgoing_flights,
        ];
    }
}
