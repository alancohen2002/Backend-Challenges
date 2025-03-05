<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Flights\Domain\Actions;

use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Model;
use Lightit\Backoffice\Flights\Domain\Models\Flight;

class ListFlightAction
{
    /**
     * @return Paginator<Model>
     */
    public function execute(): Paginator
    {
        $sortBy = request()->input('sort_by', 'id');
        $sortDirection = request()->input('sort_direction', 'asc');

        $query = Flight::query();

        $query->orderBy($sortBy, $sortDirection);

        return $query->simplePaginate(10);
    }
}
