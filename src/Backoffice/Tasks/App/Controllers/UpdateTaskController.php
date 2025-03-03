<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Tasks\App\Controllers;

use Illuminate\Http\JsonResponse;
use Lightit\Backoffice\Tasks\App\Transformers\TaskTransformer;

class UpdateTaskController
{
    public function __invoke(UpsertTaskRequest $request, UpdateTaskAction $updateTaskAction): JsonResponse
    {
        $task = $updateTaskAction->execute($request->toDto());

        return responder()
            ->success($task, TaskTransformer::class)
            ->respond(JsonResponse::HTTP_CREATED);
    }
}
