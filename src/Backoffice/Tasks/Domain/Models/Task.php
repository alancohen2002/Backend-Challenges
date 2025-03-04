<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Tasks\Domain\Models;

use Illuminate\Database\Eloquent\Model;
use Lightit\Backoffice\Employees\Domain\Models\Employee;

class Task extends Model
{
    protected $fillable = ['title', 'description', 'status', 'assignedUser'];
    
    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }
}
