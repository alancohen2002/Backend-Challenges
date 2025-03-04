<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Tasks\Domain\Actions;

use Illuminate\Database\Eloquent\Collection;
use Lightit\Backoffice\Tasks\Domain\Models\Task;

class ListTaskAction
{
    /**
     * @return Collection<int, Task>
    */
    public function execute(): Collection
    {
        return Task::with('employee')->get();
    }
}
