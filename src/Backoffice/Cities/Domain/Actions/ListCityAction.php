<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Cities\Domain\Actions;

use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Model;
use Lightit\Backoffice\Cities\Domain\Models\City;

class ListCityAction
{
    /**
     * @return Paginator<Model>
     */
    public function execute(): Paginator
    {
        $sortBy = request()->input('sort_by', 'id');
        $sortDirection = request()->input('sort_direction', 'asc');
        $airlineId = request()->input('airline_id');

        $query = City::query();

        $query->orderBy($sortBy, $sortDirection);

        if ($airlineId) {
            $query->whereHas('airlines', function ($query) use ($airlineId) {
                $query->where('airline_id', $airlineId);
            });
        }

        return $query->simplePaginate(10);
    }
}
