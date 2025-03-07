<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Cities\App\Controllers;

use Illuminate\Http\JsonResponse;
use Lightit\Backoffice\Cities\App\Requests\ListCitiesRequest;
use Lightit\Backoffice\Cities\App\Transformers\CityTransformer;
use Lightit\Backoffice\Cities\Domain\Actions\ListCityAction;

class ListCityController
{
    public function __invoke(
        ListCityAction $action,
        ListCitiesRequest $request,
    ): JsonResponse {
        $cities = $action->execute($request->toDto());

        return responder()
            ->success($cities, CityTransformer::class)
            ->respond();
    }
}
