<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Airlines\App\Controllers;

use Illuminate\Http\JsonResponse;
use Lightit\Backoffice\Airlines\App\Requests\UpsertAirlineRequest;
use Lightit\Backoffice\Airlines\App\Transformers\AirlineTransformer;
use Lightit\Backoffice\Airlines\Domain\Actions\UpdateAirlineAction;
use Lightit\Backoffice\Airlines\Domain\Models\Airline;

class UpdateAirlineController
{
    public function __invoke(
        Airline $airline,
        UpsertAirlineRequest $request,
        UpdateAirlineAction $updateAirlineAction,
    ): JsonResponse {
        $airline = $updateAirlineAction->execute($airline, $request->toDto());

        return responder()
            ->success($airline, AirlineTransformer::class)
            ->respond(JsonResponse::HTTP_OK);
    }
}
