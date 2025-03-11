<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Employees\App\Transformers;

use Flugg\Responder\Transformers\Transformer;
use Lightit\Backoffice\Employees\Domain\Models\Employee;

class EmployeeTransformer extends Transformer
{
    /**
     * @return array{id: int, name: string, email: string}
     */
    public function transform(Employee $employee): array
    {
        return [
            'id' => $employee->id,
            'name' => $employee->name,
            'email' => $employee->email,
        ];
    }
}
