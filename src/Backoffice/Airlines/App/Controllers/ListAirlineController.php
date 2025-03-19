<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Airlines\App\Controllers;

use Illuminate\Http\JsonResponse;
use Lightit\Backoffice\Airlines\App\Requests\ListAirlinesRequest;
use Lightit\Backoffice\Airlines\App\Transformers\AirlineTransformer;
use Lightit\Backoffice\Airlines\Domain\Actions\ListAirlineAction;

class ListAirlineController
{
    public function __invoke(
        ListAirlineAction $action,
        ListAirlinesRequest $request,
    ): JsonResponse {
        $airlines = $action->execute($request->toDto());

        return responder()
            ->success($airlines, AirlineTransformer::class)
            ->respond();
    }
}
