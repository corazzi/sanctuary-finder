<?php

namespace App\Models;

use App\Services\PostcodeLookup;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\OpeningHours\OpeningHours;

class Location extends Model
{
    use HasFactory, SoftDeletes;

    protected $casts = [
        'opening_times' => 'json',
    ];

    public $fillable = [
        'centre_id',
        'address_line_1',
        'address_line_2',
        'postcode',
        'town',
        'telephone',
        'latitude',
        'longitude',
        'opening_times_info',
        'opening_times',
    ];

    public function centre(): BelongsTo
    {
        return $this->belongsTo(Centre::class);
    }

    public function getOpeningTimesAttribute($hours): ?OpeningHours
    {
        if ($hours === null) {
            return null;
        }

        return OpeningHours::create(json_decode($hours, true));
    }

    public function getGoogleMapsLinkAttribute(): string
    {
        return "https://maps.google.co.uk/?q={$this->centre->name}, {$this->address_line_1}, {$this->town}, {$this->postcode}";
    }

    public function scopeNearPostcode($query, string $postcode, int $radius = PHP_INT_MAX)
    {
        $postcode = PostcodeLookup::make($postcode);

        if ($postcode->isValid()) {
            $query->withinKilometers($postcode->getLatLong(), $radius);
        }

        return $query;
    }

    public function scopeWithinKilometers($query, $location, $radius = PHP_INT_MAX)
    {
        $haversine = "(6371 * acos(cos(radians({$location['lat']}))
                     * cos(radians(locations.latitude))
                     * cos(radians(locations.longitude)
                     - radians({$location['lng']}))
                     + sin(radians({$location['lat']}))
                     * sin(radians(locations.latitude))))";

        return $query->select('*')
            ->selectRaw("{$haversine} AS distance")
            ->whereRaw("{$haversine} < ?", [$radius])
            ->orderBy('distance', 'asc');
    }
}
