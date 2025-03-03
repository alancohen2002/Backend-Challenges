<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Employees\App\Controllers;

use Illuminate\Http\JsonResponse;
use Lightit\Backoffice\Employees\App\Transformers\EmployeeTransformer;
use Lightit\Backoffice\Employees\Domain\Models\Employee;

class GetEmployeeController
{
    public function __invoke(Employee $employee): JsonResponse
    {
        return responder()
            ->success($employee, EmployeeTransformer::class)
            ->respond();
    }
}
