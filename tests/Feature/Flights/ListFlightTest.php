<?php

declare(strict_types=1);

namespace Tests\Feature\Flight;

use Database\Factories\FlightFactory;
use Illuminate\Http\JsonResponse;
use Illuminate\Testing\Fluent\AssertableJson;
use Lightit\Backoffice\Flights\Domain\Models\Flight;

use function Pest\Laravel\getJson;

describe('flights', function () {
    /** @see StoreFlightController */
    it('can list flights successfully', function () {
        $flights = FlightFactory::new()
            ->createMany(5);

        $flights = Flight::with('airline')->get();

        getJson(url('/api/flights'))
            ->assertSuccessful()
            ->assertJson(
                fn (AssertableJson $json) =>
                $json->where('status', JsonResponse::HTTP_OK)
                    ->where('success', true)
                    ->has('data', 5)
                    ->has('pagination')
                    ->has('pagination.count')
                    ->has('pagination.total')
                    ->has('pagination.perPage')
                    ->has('pagination.currentPage')
                    ->has('pagination.totalPages')
                    ->where('pagination.perPage', 10)
                    ->where('pagination.total', 5)
                    ->where('pagination.currentPage', 1)
                    ->where('pagination.totalPages', 1)
                    ->where('pagination.count', 5)
                    ->has(
                        'data.0',
                        fn (AssertableJson $json) =>
                        $json->has('id')
                            ->has('airline')
                            ->has('departure_city')
                            ->has('arrival_city')
                            ->has('departure_date')
                            ->has('arrival_date')
                            ->etc()
                    )
            );
    });
});
