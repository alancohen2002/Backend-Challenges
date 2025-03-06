<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Cities\App\Controllers;

use Illuminate\Http\JsonResponse;
use Lightit\Backoffice\Cities\App\Transformers\CityTransformer;
use Lightit\Backoffice\Cities\Domain\Actions\ListCityAction;
use Lightit\Backoffice\Cities\Domain\DataTransferObjects\SortQueryDto;

class ListCityController
{
    public function __invoke(
        ListCityAction $action,
        SortQueryDTO $sortQuery,
    ): JsonResponse {
        $cities = $action->execute($sortQuery);

        return responder()
            ->success($cities, CityTransformer::class)
            ->respond();
    }
}
