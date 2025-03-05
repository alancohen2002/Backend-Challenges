<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Airlines\Domain\Actions;

use Lightit\Backoffice\Airlines\Domain\DataTransferObjects\AirlineDto;
use Lightit\Backoffice\Airlines\Domain\Models\Airline;

class StoreAirlineAction
{
    public function execute(AirlineDto $airlineDto): Airline
    {
        return Airline::create([
            'name' => $airlineDto->getName(),
            'number_of_incoming_flights' => $airlineDto->getDescription(),
            'number_of_outgoing_flights' => $airlineDto->getNumberOfFlights(),
        ]);
    }
}
