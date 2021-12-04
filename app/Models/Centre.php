<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Centre extends Model
{
    use HasFactory, SoftDeletes;

    public $casts = [
        'social_media' => 'json',
    ];

    public $fillable = [
        'name',
        'description',
        'social_media',
        'web_address',
        'volunteering_info',
        'financial_support_info',
        'type',
        'opening_times_info',
    ];

    public function locations(): HasMany
    {
        return $this->hasMany(Location::class);
    }

    public function scopeNearLocation(Builder $builder, string $location, ?int $radius = null)
    {
        $radius = $radius ?: PHP_INT_MAX;

        return $builder->whereHas('locations', function (Builder $query) use ($location, $radius) {
            return $query->where('town', 'like', "%{$location}%");
        })->when($radius > 0,
            fn ($query) => $query->orWhereHas('locations', fn ($query) => $query->nearPostcode($location, $radius)));
    }

    public function getSlugAttribute(): string
    {
        return Str::slug($this->name);
    }

    public function getTownsAttribute(): string
    {
        return $this->locations->map->town->unique()->implode(' | ');
    }
}
