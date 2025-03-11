<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Tasks\App\Controllers;

use Illuminate\Http\JsonResponse;
use Lightit\Backoffice\Tasks\App\Transformers\TaskTransformer;
use Lightit\Backoffice\Tasks\Domain\Models\Task;

class GetTaskController
{
    public function __invoke(Task $task): JsonResponse
    {
        return responder()
            ->success($task, TaskTransformer::class)
            ->respond();
    }
}
