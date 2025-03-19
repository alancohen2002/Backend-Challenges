<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Flights\App\Controllers;

use Illuminate\Http\JsonResponse;
use Lightit\Backoffice\Flights\App\Request\UpsertFlightRequest;
use Lightit\Backoffice\Flights\App\Transformers\FlightTransformer;
use Lightit\Backoffice\Flights\Domain\Actions\StoreFlightAction;

class CreateFlightController
{
    public function __invoke(UpsertFlightRequest $request, StoreFlightAction $storeFlightAction): JsonResponse
    {
        $flight = $storeFlightAction->execute($request->toDto());

        return responder()
            ->success($flight, FlightTransformer::class)
            ->respond(JsonResponse::HTTP_CREATED);
    }
}
