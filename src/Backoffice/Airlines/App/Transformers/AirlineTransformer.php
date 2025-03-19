<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Airlines\App\Transformers;

use Flugg\Responder\Transformers\Transformer;
use Lightit\Backoffice\Airlines\Domain\Models\Airline;

class AirlineTransformer extends Transformer
{
    /**
     * @return array{id: int, name: string, description: string, number_of_flights: int}
     */
    public function transform(Airline $airline): array
    {
        Airline::with('cities')->find($airline->id);

        return [
            'id' => $airline->id,
            'name' => $airline->name,
            'description' => $airline->description,
            'number_of_flights' => $airline->flights()->count(),
            'operating_cities' => $airline->loadMissing('cities')->cities->pluck('name'),
        ];
    }
}
