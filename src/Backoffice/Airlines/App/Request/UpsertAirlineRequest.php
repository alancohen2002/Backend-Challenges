<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Airlines\App\Request;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Lightit\Backoffice\Airlines\Domain\DataTransferObjects\AirlineDto;

class UpsertAirlineRequest extends FormRequest
{
    public const NAME = 'name';

    public const DESCRIPTION = 'description';

    public const NUMBER_OF_FLIGHTS = 'number_of_flights';

    /**
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            self::NAME => ['required', Rule::unique('airlines')],
            self::DESCRIPTION => [],
            self::NUMBER_OF_FLIGHTS => [],
            
        ];
    }

    public function toDto(): AirlineDto
    {
        return new AirlineDto(
            name: $this->string(self::NAME)->toString(),
            description: $this->string(self::DESCRIPTION)->toString(),
            number_of_flights: $this->int(self::NUMBER_OF_FLIGHTS),
        );
    }
}
