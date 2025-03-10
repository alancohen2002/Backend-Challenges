<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Flights\App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Lightit\Backoffice\Airlines\Domain\Models\Airline;
use Lightit\Backoffice\Cities\Domain\Models\City;

class DepartureCityValidatorRule implements ValidationRule
{
    public function __construct(protected int $airlineId)
    {
    }

    /**
     * Run the validation rule.
     *
     * @param \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        /** @var City $city */
        $city = City::findOrFail($value); 

        $airline = Airline::with('cities')->findOrFail($this->airlineId);

        if (! $airline->cities->contains($city)) {
            $fail('The airline does not operate in the ' . $attribute . '.');
        }
    }
}
