<?php

namespace App\Services;

use App\Models\Postcode;
use Illuminate\Support\Arr;

class PostcodeLookup
{
    private $postcode;

    private $data;

    private $valid = false;

    public function __construct(?string $postcode)
    {
        $this->postcode = strtoupper(
            str_replace(' ', '', $postcode)
        );

        $this->resolveIfValid();
    }

    public function isValid()
    {
        return $this->valid;
    }

    public function getQuery()
    {
        return $this->postcode;
    }

    private function resolveIfValid()
    {
        if ($this->validatePostcode()) {
            return $this->resolve();
        }

        return $this;
    }

    private function validatePostcode()
    {
        return preg_match(
            '/\b((?:(?:gir)|(?:[a-pr-uwyz])(?:(?:[0-9](?:[a-hjkpstuw]|[0-9])?)|(?:[a-hk-y][0-9](?:[0-9]|[abehmnprv-y])?))))( ?([0-9][abd-hjlnp-uw-z]{2}))?\b/i',
            $this->postcode
        );
    }

    private function resolve()
    {
        $this->data = Postcode::query()
            ->where('postcode_no_space', $this->postcode)
            ->orWhere('outcode', $this->postcode)
            ->first();

        if ($this->data !== null) {
            $this->valid = true;
        }

        return $this;
    }

    public static function make(?string $postcode)
    {
        return new static($postcode);
    }

    public function getLatLong(): array
    {
        return [
            'lat' => Arr::get($this->data, 'latitude'),
            'lng' => Arr::get($this->data, 'longitude'),
        ];
    }
}
