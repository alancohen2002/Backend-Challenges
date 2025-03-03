<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Tasks\Domain\Actions;

use Lightit\Backoffice\Tasks\Domain\DataTransferObjects\TaskDto;
use Lightit\Backoffice\Tasks\Domain\Models\Task;

class StoreTaskAction
{
    public function execute(TaskDto $taskDto): Task
    {
        $task = Task::find($taskDto->id);

        if (! $task) {
            throw new \Exception("Task with ID {$taskDto->id} not found.");
        }
    
        $task->update([
            'title' => $taskDto->getTitle(),
            'description' => $taskDto->getDescription(),
            'status' => $taskDto->getStatus(),
        ]);


        return $task;
    }
}
