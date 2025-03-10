<?php

declare(strict_types=1);

namespace Tests\Feature\Flights;

use Database\Factories\FlightFactory;
use function Pest\Laravel\assertDatabaseMissing;
use function Pest\Laravel\deleteJson;

describe('Flights', function () {
    /** @see DeleteFlightController */
    it('can delete a flight successfully', function () {
        $flight = FlightFactory::new()->createOne();

        $response = deleteJson(url("/api/flights/$flight->id"));

        assertDatabaseMissing('flights', ['id' => $flight['id']]);
    });
});
