<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Airlines\Domain\Actions;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Lightit\Backoffice\Airlines\Domain\Models\Airline;
use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\Contracts\Pagination\Paginator;


class ListAirlineAction
{
    /**
     * @return Paginator<Model>
     */
    public function execute(): Paginator
    {
        $sortBy = request()->input('sort_by', 'id'); 
        $sortDirection = request()->input('sort_direction', 'asc'); 
        $cityId = request()->input('city_id');

        $query = Airline::query();

        $query->orderBy($sortBy, $sortDirection);

        if ($cityId) {
            $query->whereHas('cities', function ($query) use ($cityId) {
                $query->where('city_id', $cityId);
            });
        }

        return $query->simplePaginate(10);
    }
}
