<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Tasks\App\Controllers;

use Illuminate\Http\JsonResponse;
use Lightit\Backoffice\Tasks\App\Request\StoreTaskRequest;
use Lightit\Backoffice\Tasks\App\Transformers\TaskTransformer;
use Lightit\Backoffice\Tasks\Domain\Actions\StoreTaskAction;

class CreateTaskController
{
    public function __invoke(StoreTaskRequest $request, StoreTaskAction $storeTaskAction): JsonResponse
    {
        $task = $storeTaskAction->execute($request->toDto());

        return responder()
            ->success($task, TaskTransformer::class)
            ->respond();
    }
}
