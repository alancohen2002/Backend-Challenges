<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Cities\App\Request;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Lightit\Backoffice\Cities\Domain\DataTransferObjects\CityDto;

class UpsertCityRequest extends FormRequest
{
    public const NAME = 'name';

    public const NUMBER_OF_INCOMING_FLIGHTS = 'number_of_incoming_flights';

    public const NUMBER_OF_OUTGOING_FLIGHTS = 'number_of_outgoing_flights';

    /**
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            self::NAME => ['required', Rule::unique('cities')],
            self::NUMBER_OF_INCOMING_FLIGHTS => [],
            self::NUMBER_OF_OUTGOING_FLIGHTS => [],
            
        ];
    }

    public function toDto(): CityDto
    {
        return new CityDto(
            name: $this->string(self::NAME)->toString(),
            number_of_incoming_flights: $this->int(self::NUMBER_OF_INCOMING_FLIGHTS),
            number_of_outgoing_flights: $this->int(self::NUMBER_OF_OUTGOING_FLIGHTS),
        );
    }
}
