<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Airlines\App\Transformers;

use Flugg\Responder\Transformers\Transformer;
use Lightit\Backoffice\Airlines\Domain\Models\Airline;

class AirlineTransformer extends Transformer
{
    /**
     * @return array{id: int, name: string, email: string}
     */
    public function transform(Airline $airline): array
    {
        return [
            'id' => $airline->id,
            'name' => $airline->name,
            'description' => $airline->description,
            'number_of_flights' => $airline->number_of_flights,
        ];
    }
}
