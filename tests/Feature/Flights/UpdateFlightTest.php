<?php

declare(strict_types=1);

namespace Tests\Feature\Flight;

use Carbon\Carbon;
use Database\Factories\FlightFactory;
use Illuminate\Http\JsonResponse;

use function Pest\Laravel\putJson;
use function PHPUnit\Framework\assertEquals;

describe('flights', function () {
    /** @see UpdateFlightController */
    it('can update a flight successfully', function () {
        $flight = FlightFactory::new()->createOne();

        $updatedData = [
            'airline' => $flight->airline_id,
            'departure_city' => $flight->departure_city_id,
            'arrival_city' => $flight->arrival_city_id,
            'departure_date' => now()->addDays(10)->toDateString(),
            'arrival_date' => now()->addDays(12)->toDateString(),
        ];

        $response = putJson(url("/api/flights/{$flight->id}"), $updatedData);
        
        $response->assertOk()
            ->assertJson([
                'success' => true,
                'status' => JsonResponse::HTTP_OK,
            ]);
        $departureDate = Carbon::parse($flight->departure_date);
        $arrivalDate = Carbon::parse($flight->arrival_date);
            
        assertEquals($departureDate->toDateString(), $updatedData['departure_date']);
        assertEquals($arrivalDate->toDateString(), $updatedData['arrival_date']);
    });
});
