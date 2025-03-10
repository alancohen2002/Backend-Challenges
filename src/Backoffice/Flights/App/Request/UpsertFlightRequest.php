<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Flights\App\Request;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Lightit\Backoffice\Airlines\Domain\Models\Airline;
use Lightit\Backoffice\Cities\Domain\Models\City;
use Lightit\Backoffice\Flights\Domain\DataTransferObjects\FlightDto;

class UpsertFlightRequest extends FormRequest
{
    public const AIRLINE = 'airline';

    public const DEPARTURE_CITY = 'departure_city';

    public const ARRIVAL_CITY = 'arrival_city';

    public const DEPARTURE_DATE = 'departure_date';

    public const ARRIVAL_DATE = 'arrival_date';

    public function rules(): array
    {
        return [
            self::AIRLINE => ['required', 'integer', 'exists:airlines,id'],
            self::DEPARTURE_CITY => [
                'required',
                'integer',
                'exists:cities,id',
                function ($attribute, $value, $fail) {
                    $airline = Airline::findOrFail($this->input(self::AIRLINE)); 
                    $departureCity = City::findOrFail($this->input(self::DEPARTURE_CITY)); 

                    if (!$airline->cities->contains($departureCity)) {
                        $fail('The airline does not operate in the departure city.');
                    }
                },
            ],
            self::ARRIVAL_CITY => [
                'required',
                'integer',
                'exists:cities,id',
                function ($attribute, $value, $fail) {
                    $airline = Airline::findOrFail($this->input(self::AIRLINE)); 
                    $arrivalCity = City::findOrFail($this->input(self::ARRIVAL_CITY));

                    if (!$airline->cities->contains($arrivalCity)) {
                        $fail('The airline does not operate in the arrival city.');
                    }
                },
            ],
            self::DEPARTURE_DATE => ['required', 'date', ],
            self::ARRIVAL_DATE => ['required', 'date'],
            
        ];
    }

    public function toDto(): FlightDto
    {
        /** @var string $departure_date */
        $departure_date = $this->input(self::DEPARTURE_DATE);

        /** @var string $arrival_date */
        $arrival_date = $this->input(self::ARRIVAL_DATE);

        return new FlightDto(
            airline: $this->integer(self::AIRLINE),
            departure_city: $this->integer(self::DEPARTURE_CITY),
            arrival_city: $this->integer(self::ARRIVAL_CITY),
            departure_date: Carbon::parse($departure_date),
            arrival_date: Carbon::parse($arrival_date),
        );
    }
}
