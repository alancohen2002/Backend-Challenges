<?php

declare(strict_types=1);

namespace Tests\Feature\Flights;

use Database\Factories\AirlineFactory;
use Database\Factories\CityFactory;
use Database\Factories\FlightFactory;
use Illuminate\Http\JsonResponse;
use Lightit\Backoffice\Flights\App\Controllers\StoreFlightController;
use Lightit\Backoffice\Flights\Domain\Models\Flight;
use function Pest\Laravel\postJson;
use function PHPUnit\Framework\assertEquals;

describe('Flights', function () {
    /** @see StoreFlightController */
    it('can create a flight successfully', function () {
        $data = FlightFactory::new()->createOne();
        $departureCity = CityFactory::new()->createOne();
        $arrivalCity = CityFactory::new()->createOne();
        $airline = AirlineFactory::new()->createOne();

        $airline->cities()->attach($departureCity);
        $airline->cities()->attach($arrivalCity);


        $requestBody = [
            'airline' => $airline->id,
            'departure_city' => $departureCity->id,
            'arrival_city' => $arrivalCity->id,
            'departure_date'=> '2024-01-01',
            'arrival_date'=> '2025-06-11',
        ];

        $response = postJson(url('/api/flights'), $requestBody);

        $flight = Flight::findOrFail($data->id);
            
        $response
            ->assertCreated()
            ->assertJson([
                'success' => true,
                'status' => JsonResponse::HTTP_CREATED,
            ]);

        assertEquals($flight->airline_id, $data['airline_id']);
        assertEquals($flight->departure_city_id, $data['departure_city_id']);
        assertEquals($flight->arrival_city_id, $data['arrival_city_id']);
        assertEquals($flight->departure_date, $data['departure_date']);
        assertEquals($flight->arrival_date, $data['arrival_date']);
    });
});
