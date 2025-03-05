<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Airlines\Domain\Actions;

use Lightit\Backoffice\Airlines\Domain\DataTransferObjects\AirlineDto;
use Lightit\Backoffice\Airlines\Domain\Models\Airline;

class UpdateAirlineAction
{
    public function execute(Airline $airline, AirlineDto $airlineDto): Airline
    {
        $airline = Airline::find($airline);

        if (! $airline) {
            throw new \Exception('Airline not found.');
        }

        $airline->update([
            'name' => $airlineDto->getName(),
            'description' => $airlineDto->getDescription(),
            'number_of_flights' => $airlineDto->getNumberOfFlights(),
        ]);

        return $airline;
    }
}
