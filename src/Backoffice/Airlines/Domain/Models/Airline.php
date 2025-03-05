<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Airlines\Domain\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Lightit\Backoffice\Cities\Domain\Models\City;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Airline extends Model
{
    protected $guarded = ['id'];

    /**
     * @return BelongsToMany<City, $this>
    */
    public function cities(): BelongsToMany
    {
        return $this->belongsToMany(City::class, 'airline_city');
    }
}
