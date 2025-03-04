<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Tasks\App\Controllers;
use Lightit\Backoffice\Tasks\App\Request\UpsertTaskRequest;


use Illuminate\Http\JsonResponse;
use Lightit\Backoffice\Tasks\App\Transformers\TaskTransformer;
use Lightit\Backoffice\Tasks\Domain\Models\Task;
use Lightit\Backoffice\Tasks\Domain\Actions\UpdateTaskAction;

class UpdateTaskController
{
    public function __invoke(Task $task, UpsertTaskRequest $request, UpdateTaskAction $updateTaskAction): JsonResponse
    {
        $task = $updateTaskAction->execute($task,$request->toDto());

       

        return responder()
            ->success($task, TaskTransformer::class)
            ->respond(JsonResponse::HTTP_CREATED);
    }
}
