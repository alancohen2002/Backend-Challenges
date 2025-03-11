<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Cities\App\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;
use Lightit\Backoffice\Cities\Domain\DataTransferObjects\ListCityData;
use Lightit\Shared\App\Enums\OrderDirectionEnum;

class ListCitiesRequest extends FormRequest
{
    public const SORT_BY = 'sortBy';

    public const AIRLINE_ID = 'airlineId';

    public const ORDER_DIRECTION = 'sortDirection';

    public function rules(): array
    {
        return [
            self::SORT_BY => ['nullable', 'string', 'in:name,id'],
            self::AIRLINE_ID => ['nullable', 'integer', 'exists:airlines,id'],
            self::ORDER_DIRECTION => ['nullable', 'string', new Enum(OrderDirectionEnum::class)]];
    }

    public function toDto(): ListCityData
    {
        return new ListCityData(
            sortBy: $this->string(self::SORT_BY)->toString(),
            airlineId: $this->integer(self::AIRLINE_ID),
            sortDirection: $this->string(self::ORDER_DIRECTION)->toString(),
        );
    }
}
