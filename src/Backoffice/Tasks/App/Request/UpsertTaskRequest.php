<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Tasks\App\Request;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Lightit\Backoffice\Tasks\App\Enums\TaskStatusEnum;
use Lightit\Backoffice\Tasks\Domain\DataTransferObjects\TaskDto;

class UpsertTaskRequest extends FormRequest
{
    public const TITLE = 'title';

    public const DESCRIPTION = 'description';

    public const STATUS = 'status';
    
    public const EMPLOYEE_ID = 'employee_id';

    /**
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            self::TITLE => ['required','string'],
            self::DESCRIPTION => ['required','string'],
            self::STATUS => ['required', Rule::enum(TaskStatusEnum::class)],
            self::EMPLOYEE_ID => ['required', 'exists:employees,id'],
        ];
    }

    public function toDto(): TaskDto
    {
        return new TaskDto(
            title: $this->string(self::TITLE)->toString(),
            description: $this->string(self::DESCRIPTION)->toString(),
            status: $this->string(self::STATUS)->toString(),
            employee_id: $this->string(self::EMPLOYEE_ID)->toString(),
        );
    }
}
