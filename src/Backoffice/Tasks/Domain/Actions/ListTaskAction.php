<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Tasks\Domain\Actions;

use Illuminate\Database\Eloquent\Collection;
use Lightit\Backoffice\Tasks\Domain\Models\Task;
use Spatie\QueryBuilder\QueryBuilder;

class ListTaskAction
{

     /**
     * @return Collection<int, Task>
     */
    public function execute(): Collection
    {
        return QueryBuilder::for(Task::class)
            ->allowedFilters(['title'])
            ->allowedSorts('title')
            ->get();
    }
}
