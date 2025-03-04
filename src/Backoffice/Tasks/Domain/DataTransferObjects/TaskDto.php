<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Tasks\Domain\DataTransferObjects;

class TaskDto
{
    public function __construct(
        private readonly string $title,
        private readonly string $description,
        private readonly string $status,
        private readonly string $employee_id,
    ) {
    }

   
    public function getTitle(): string
    {
        return $this->title;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function getAssignedEmployee(): string
    {
        return $this->employee_id;
    }
}
