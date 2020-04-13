<?php

namespace App\Domain\Models;

use App\Domain\Queries\NearLocationQuery;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Sanctuary extends Model
{
    protected $casts = [
        'social_media' => 'array'
    ];

    public function scopeVegan(Builder $builder)
    {
        return $builder->where('vegan', true);
    }

    public function scopeNearLocation($query, $location, $radius)
    {
        return (
            new NearLocationQuery($query, $location, $radius)
        )->resolve();
    }

    public function scopeWithinKilometers($query, $location, $radius = 25) {
        $haversine = "(6371 * acos(cos(radians({$location['lat']}))
                     * cos(radians(sanctuaries.lat))
                     * cos(radians(sanctuaries.lng)
                     - radians({$location['lng']}))
                     + sin(radians({$location['lat']}))
                     * sin(radians(sanctuaries.lat))))";

        return $query->select('*')
            ->selectRaw("{$haversine} AS distance")
            ->whereRaw("{$haversine} < ?", [$radius]);
    }
}
