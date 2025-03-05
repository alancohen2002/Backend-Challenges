<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Employees\Domain\Actions;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Lightit\Backoffice\Employees\Domain\Models\Employee;
use Spatie\QueryBuilder\QueryBuilder;

class ListEmployeeAction
{
    /**
     * @return Collection<int, Model>
     */
    public function execute(): Collection
    {
        return Employee::with('tasks')->get();
    }
}
