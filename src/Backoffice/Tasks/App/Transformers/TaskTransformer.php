<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Employees\App\Transformers;

use Flugg\Responder\Transformers\Transformer;
use Lightit\Backoffice\Tasks\Domain\Models\Task;

class TaskTransformer extends Transformer
{
    public function transform(Task $task): array
    {
        return [
            'id' => $employee->id,
            'title' => $task->title,
            'description' => $task->description,
            'status' => $task->status,
            'assignedUser' => $task->assignedUser,

        ];
    }
}
