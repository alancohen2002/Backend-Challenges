<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Airlines\App\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Lightit\Backoffice\Airlines\Domain\DataTransferObjects\AirlineDto;

class UpsertAirlineRequest extends FormRequest
{
    public const NAME = 'name';

    public const DESCRIPTION = 'description';

    public const NUMBER_OF_FLIGHTS = 'number_of_flights';

    public function rules(): array
    {
        return [
            self::NAME => ['required', Rule::unique('airlines')],
            self::DESCRIPTION => ['required', 'string'],
            self::NUMBER_OF_FLIGHTS => ['numeric'],
            
        ];
    }

    public function toDto(): AirlineDto
    {
        return new AirlineDto(
            name: $this->string(self::NAME)->toString(),
            description: $this->string(self::DESCRIPTION)->toString(),
            number_of_flights: $this->integer(self::NUMBER_OF_FLIGHTS),
        );
    }
}
