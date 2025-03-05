<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Airlines\App\Controllers;

use Illuminate\Http\JsonResponse;
use Lightit\Backoffice\Airlines\App\Request\UpsertAirlineRequest;
use Lightit\Backoffice\Airlines\App\Transformers\AirlineTransformer;
use Lightit\Backoffice\Airlines\Domain\Actions\StoreAirlineAction;

class CreateAirlineController
{
    public function __invoke(UpsertAirlineRequest $request, StoreAirlineAction $storeAirlineAction): JsonResponse
    {
        $airline = $storeAirlineAction->execute($request->toDto());

        return responder()
            ->success($airline, AirlineTransformer::class)
            ->respond(JsonResponse::HTTP_CREATED);
    }
}
