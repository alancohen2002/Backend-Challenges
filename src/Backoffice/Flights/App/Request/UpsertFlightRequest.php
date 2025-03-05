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
            self::AIRLINE => ['required', 'exists:airlines,id'],
            self::DEPARTURE_CITY => ['required', 'exists:cities,id'],
            self::ARRIVAL_CITY => ['required', 'exists:cities,id'],
            
        ];
    }

    public function toDto(): FlightDto
    {
        return new FlightDto(
            airline: $this->string(self::AIRLINE)->toString(),
            departure_city: $this->string(self::DEPARTURE_CITY)->toString(),
            arrival_city: $this->string(self::ARRIVAL_CITY)->toString(),
        );
    }
}
