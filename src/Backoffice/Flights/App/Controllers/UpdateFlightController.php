<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Flights\App\Controllers;

use Illuminate\Http\JsonResponse;
use Lightit\Backoffice\Flights\App\Request\UpsertFlightRequest;
use Lightit\Backoffice\Flights\App\Transformers\FlightTransformer;
use Lightit\Backoffice\Flights\Domain\Actions\UpdateFlightAction;
use Lightit\Backoffice\Flights\Domain\Models\Flight;

class UpdateFlightController
{
    public function __invoke(
        Flight $flight,
        UpsertFlightRequest $request,
        UpdateFlightAction $updateFlightAction,
    ): JsonResponse {
        $flight = $updateFlightAction->execute($flight, $request->toDto());

        return responder()
            ->success($flight, FlightTransformer::class)
            ->respond();
    }
}
