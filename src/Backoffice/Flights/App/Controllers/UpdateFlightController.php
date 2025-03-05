<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Flights\App\Controllers;

use Illuminate\Http\JsonResponse;
use Lightit\Backoffice\Flights\Domain\Models\Flight;

class UpdateFlightController
{
    public function __invoke(
        Flight $airline,
        UpsertAirlineRequest $request,
        UpdateAirlineAction $updateAirlineAction,
    ): JsonResponse {
        $airline = $updateAirlineAction->execute($airline, $request->toDto());

        return responder()
            ->success($airline, AirlineTransformer::class)
            ->respond(JsonResponse::HTTP_CREATED);
    }
}
