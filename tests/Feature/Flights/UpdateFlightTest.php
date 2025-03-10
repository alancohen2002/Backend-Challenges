<?php

declare(strict_types=1);

namespace Tests\Feature\Flight;

use Carbon\Carbon;
use Database\Factories\AirlineFactory;
use Database\Factories\CityFactory;
use Database\Factories\FlightFactory;
use Illuminate\Http\JsonResponse;

use function Pest\Laravel\putJson;
use function PHPUnit\Framework\assertEquals;

describe('flights', function () {
    /** @see UpdateFlightController */
    it('can update a flight successfully', function () {
        $flight = FlightFactory::new()->createOne();
        $departureCity = CityFactory::new()->createOne();
        $arrivalCity = CityFactory::new()->createOne();
        $airline = AirlineFactory::new()->createOne();

        $airline->cities()->attach($departureCity);
        $airline->cities()->attach($arrivalCity);

        $updatedData = [
            'airline' => $airline->id,
            'departure_city' => $departureCity->id,
            'arrival_city' => $arrivalCity->id,
            'departure_date' => now()->addDays(10)->toDateString(),
            'arrival_date' => now()->addDays(12)->toDateString(),
        ];

        $response = putJson(url("/api/flights/{$flight->id}"), $updatedData);

        $jsonContent = $response->getContent();

        if ($jsonContent === false) {
            throw new \Exception('API response is not a valid JSON.');
        }

        $retrievedFlight = json_decode($jsonContent);

        if (! isset($retrievedFlight->data)) {
            throw new \Exception('structure does not contain "data".');
        }
        
        $retrievedFlight = $retrievedFlight->data;

        
        $response->assertOk()
            ->assertJson([
                'success' => true,
                'status' => JsonResponse::HTTP_OK,
            ]);
        
        $departureDate = Carbon::parse($retrievedFlight->departure_date);
        $arrivalDate = Carbon::parse($retrievedFlight->arrival_date);
            
        assertEquals($departureDate->toDateString(), $updatedData['departure_date']);
        assertEquals($arrivalDate->toDateString(), $updatedData['arrival_date']);
    });
});
