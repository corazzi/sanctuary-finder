<?php

namespace App\Domain\Models;

use App\Domain\Queries\NearLocationQuery;
use App\Domain\Services\PostcodeLookup;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Sanctuary extends Model
{
    protected $casts = [
        'social_media' => 'array',
    ];

    public function scopeVegan(Builder $builder)
    {
        return $builder->where('vegan', true);
    }

    public function scopeNearPostcode($query, PostcodeLookup $postcode, int $radius)
    {
        if ($postcode->isValid()) {
            $query->withinKilometers($postcode->getLatLong(), $radius);
        } else {
            $query->where('town', 'like', "%{$postcode->getQuery()}%");
        }

        return $query;
    }

    public function scopeWithinKilometers($query, $location, $radius = 25)
    {
        $haversine = "(6371 * acos(cos(radians({$location['lat']}))
                     * cos(radians(sanctuaries.lat))
                     * cos(radians(sanctuaries.lng)
                     - radians({$location['lng']}))
                     + sin(radians({$location['lat']}))
                     * sin(radians(sanctuaries.lat))))";

        return $query->select('*')
            ->selectRaw("{$haversine} AS distance")
            ->whereRaw("{$haversine} < ?", [$radius])
            ->orderBy('distance', 'asc');
    }
}
