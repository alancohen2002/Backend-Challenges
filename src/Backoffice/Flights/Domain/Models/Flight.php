<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Flights\Domain\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Lightit\Backoffice\Airlines\Domain\Models\Airline;
use Lightit\Backoffice\Cities\Domain\Models\City;

/**
 * @property int                             $id
 * @property int                             $airline_id
 * @property int                             $city_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read Airline $airline
 * @property-read City $city
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Flight newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Flight newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Flight query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Flight whereAirlineId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Flight whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Flight whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Flight whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Flight whereUpdatedAt($value)
 *
 * @property int $departure_city_id
 * @property int $arrival_city_id
 * @property-read City $arrivalCity
 * @property-read City $departureCity
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Flight whereArrivalCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Flight whereDepartureCityId($value)
 *
 * @mixin \Eloquent
 */
class Flight extends Model
{
    protected $guarded = ['id'];

    /**
     * @return BelongsTo<Airline, $this>
    */
    public function airline(): BelongsTo
    {
        return $this->belongsTo(Airline::class);
    }

    /**
     * @return BelongsTo<City, $this>
    */
    public function departureCity(): BelongsTo
    {
        return $this->belongsTo(City::class, 'departure_city_id');
    }

    /**
     * @return BelongsTo<City, $this>
    */
    public function arrivalCity(): BelongsTo
    {
        return $this->belongsTo(City::class, 'arrival_city_id');
    }
}
