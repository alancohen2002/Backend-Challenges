<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Cities\Domain\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Lightit\Backoffice\Airlines\Domain\Models\Airline;
use Lightit\Backoffice\Flights\Domain\Models\Flight;

/**
 * 
 *
 * @property int                             $id
 * @property string                          $name
 * @property int                             $number_of_incoming_flights
 * @property int                             $number_of_outgoing_flights
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|City newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|City newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|City query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|City whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|City whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|City whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|City whereNumberOfIncomingFlights($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|City whereNumberOfOutgoingFlights($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|City whereUpdatedAt($value)
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Airline> $airlines
 * @property-read int|null $airlines_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Flight> $flights
 * @property-read int|null $flights_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Flight> $flightsAsArrivalCity
 * @property-read int|null $flights_as_arrival_city_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Flight> $flightsAsDepartureCity
 * @property-read int|null $flights_as_departure_city_count
 * @mixin \Eloquent
 */
class City extends Model
{
    protected $guarded = ['id'];

    /**
     * @return BelongsToMany<Airline, $this>
    */
    public function airlines(): BelongsToMany
    {
        return $this->belongsToMany(Airline::class, 'airline_city');
    }

    /**
     * @return HasMany<Flight, $this>
    */
    public function flightsAsDepartureCity(): HasMany
    {
        return $this->hasMany(Flight::class, 'departure_city_id');
    }

    /**
     * @return HasMany<Flight, $this>
    */
    public function flightsAsArrivalCity(): HasMany
    {
        return $this->hasMany(Flight::class, 'arrival_city_id');
    }
}
