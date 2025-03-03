<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Employees\Domain\Actions;

use Lightit\Backoffice\Employees\Domain\DataTransferObjects\EmployeeDto;
use Lightit\Backoffice\Employees\Domain\Models\Employee;

class StoreEmployeeAction
{
    public function execute(EmployeeDto $employeeDto): Employee
    {
        $employee = new Employee([
            'name' => $employeeDto->getName(),
            'email' => $employeeDto->getEmail(),
        ]);

        $employee->save();


        return $employee;
    }
}
