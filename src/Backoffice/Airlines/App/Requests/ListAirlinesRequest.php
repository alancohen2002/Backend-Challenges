<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Airlines\App\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Lightit\Backoffice\Airlines\Domain\DataTransferObjects\ListAirlineData;
use Lightit\Shared\App\Enums\OrderDirectionEnum;

class ListAirlinesRequest extends FormRequest
{
    public const NUMBER_OF_ACTIVE_FLIGHTS = 'number_of_active_flights';

    public const CITY_ID = 'city_id';

    public const ORDER_DIRECTION = 'order_direction';

    public function rules(): array
    {
        return [
            self::NUMBER_OF_ACTIVE_FLIGHTS => ['nullable', 'integer'],
            self::CITY_ID => ['nullable', 'integer', 'exists:cities,id'],
            self::ORDER_DIRECTION => ['nullable', 'string', Rule::enum(OrderDirectionEnum::class)]];
    }

    public function toDto(): ListAirlineData
    {
        return new ListAirlineData(
            number_of_active_flights: $this->integer(self::NUMBER_OF_ACTIVE_FLIGHTS),
            city_id: $this->integer(self::CITY_ID),
            order_direction: $this->enum(self::ORDER_DIRECTION, OrderDirectionEnum::class)
        );
    }
}
