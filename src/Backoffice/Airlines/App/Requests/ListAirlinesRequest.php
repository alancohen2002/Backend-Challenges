<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Airlines\App\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Lightit\Backoffice\Airlines\Domain\DataTransferObjects\ListAirlineData;

class ListAirlinesRequest extends FormRequest
{
    public const NUMBER_OF_ACTIVE_FLIGHTS = 'numberOfActiveFlights';

    public const CITY_ID = 'cityId';

    public const ORDER_DIRECTION = 'sortDirection';

    public function rules(): array
    {
        return [
            self::NUMBER_OF_ACTIVE_FLIGHTS => ['nullable', 'integer'],
            self::CITY_ID => ['nullable', 'integer', 'exists:cities,id'],
            self::ORDER_DIRECTION => ['nullable', 'string', 'in:asc,desc'],
        ];
    }

    public function toDto(): ListAirlineData
    {
        return new ListAirlineData(
            numberOfActiveFlights: $this->integer(self::NUMBER_OF_ACTIVE_FLIGHTS),
            cityId: $this->integer(self::CITY_ID),
            sortDirection: $this->string(self::ORDER_DIRECTION)->toString(),
        );
    }
}
