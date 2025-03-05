<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Tasks\Domain\Actions;

use Lightit\Backoffice\Tasks\App\Notifications\TaskAssignmentNotification;
use Lightit\Backoffice\Tasks\Domain\DataTransferObjects\TaskDto;
use Lightit\Backoffice\Tasks\Domain\Models\Task;

class UpdateTaskAction
{
    public function execute(Task $task, TaskDto $taskDto): Task
    {

        if (! $task) {
            throw new \Exception('Task not found.');
        }
    
        $task->update([
            'title' => $taskDto->getTitle(),
            'description' => $taskDto->getDescription(),
            'status' => $taskDto->getStatus(),
            'employee_id' => $taskDto->getAssignedEmployee(),
        ]);

        $task->employee?->notify(new TaskAssignmentNotification($task));


        return $task;
    }
}
