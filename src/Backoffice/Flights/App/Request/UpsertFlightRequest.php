<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Flights\App\Request;

use Illuminate\Foundation\Http\FormRequest;
use Lightit\Backoffice\Flights\Domain\DataTransferObjects\FlightDto;

class UpsertFlightRequest extends FormRequest
{
    public const AIRLINE = 'name';

    public const DEPARTURE_CITY = 'departure_city';

    public const ARRIVAL_CITY = 'arrival_city';

    /**
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            self::AIRLINE => ['required', 'numeric', 'exists:airlines,id'],
            self::DEPARTURE_CITY => ['required', 'numeric', 'exists:cities,id'],
            self::ARRIVAL_CITY => ['required', 'numeric', 'exists:cities,id'],
            
        ];
    }

    public function toDto(): FlightDto
    {
        return new FlightDto(
            airline: $this->integer(self::AIRLINE),
            departure_city: $this->integer(self::DEPARTURE_CITY),
            arrival_city: $this->integer(self::ARRIVAL_CITY),
        );
    }
}
