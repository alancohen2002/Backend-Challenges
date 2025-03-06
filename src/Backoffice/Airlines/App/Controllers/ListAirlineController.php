<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Airlines\App\Controllers;

use Illuminate\Http\JsonResponse;
use Lightit\Backoffice\Airlines\App\Transformers\AirlineTransformer;
use Lightit\Backoffice\Airlines\Domain\Actions\ListAirlineAction;
use Lightit\Backoffice\Airlines\Domain\DataTransferObjects\SortQueryDto;

class ListAirlineController
{
    public function __invoke(
        ListAirlineAction $action,
        SortQueryDTO $sortQuery,
    ): JsonResponse {
        $airlines = $action->execute($sortQuery);

        return responder()
            ->success($airlines, AirlineTransformer::class)
            ->respond();
    }
}
