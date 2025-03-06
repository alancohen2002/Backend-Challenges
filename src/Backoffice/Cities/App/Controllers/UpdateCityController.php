<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Cities\App\Controllers;

use Illuminate\Http\JsonResponse;
use Lightit\Backoffice\Cities\App\Request\UpsertCityRequest;
use Lightit\Backoffice\Cities\App\Transformers\CityTransformer;
use Lightit\Backoffice\Cities\Domain\Actions\UpdateCityAction;
use Lightit\Backoffice\Cities\Domain\Models\City;

class UpdateCityController
{
    public function __invoke(City $city, UpsertCityRequest $request, UpdateCityAction $updateCityAction): JsonResponse
    {
        $city = $updateCityAction->execute($city, $request->toDto());

        return responder()
            ->success($city, CityTransformer::class)
            ->respond(JsonResponse::HTTP_OK);
    }
}
