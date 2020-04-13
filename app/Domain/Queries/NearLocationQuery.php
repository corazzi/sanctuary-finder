<?php

namespace App\Domain\Queries;

use Illuminate\Database\Eloquent\Builder;

class NearLocationQuery
{
    public $original;
    public $location;
    public $radius;

    public function __construct($original, $location, $radius)
    {

        $this->original = $original;
        $this->location = $location;
        $this->radius = $radius;
    }

    public function resolve()
    {
        return $this->original->where(function (Builder $builder) {
            $builder->where('town', $this->location->getQuery());

            $builder->when($this->location->isValid(), function (Builder $builder) {
                $builder->orWhere(function(Builder $builder) {
                    $builder->withinKilometers($this->location->getLatLong(), $this->radius)->get();
                });
            });
        });
    }
}
