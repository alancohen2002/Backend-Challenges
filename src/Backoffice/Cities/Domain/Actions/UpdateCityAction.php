<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Cities\Domain\Actions;

use Lightit\Backoffice\Cities\Domain\DataTransferObjects\CityDto;
use Lightit\Backoffice\Cities\Domain\Models\City;

class UpdateCityAction
{
    public function execute(City $city, CityDto $cityDto): City
    {
        $city->update([
            'name' => $cityDto->getName(),
            'number_of_incoming_flights' => $cityDto->getNumberOfIncomingFlights(),
            'number_of_outgoing_flights' => $cityDto->getNumberOfOutgoingFlights(),
        ]);

        return $city;
    }
}
