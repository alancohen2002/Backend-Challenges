<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Tasks\App\Enums;

enum TaskStatusEnum: string
{
    case Accepted = 'accepted';
    case Rejected = 'rejected';
    case Pending = 'pending';
}
