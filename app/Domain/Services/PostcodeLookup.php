<?php

namespace App\Domain\Services;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;

class PostcodeLookup
{
    private $endpoint = 'http://api.getthedata.com/postcode';

    private $postcode;

    private $response;

    private $valid = false;

    public function __construct(string $postcode)
    {
        $this->postcode = str_replace(' ', '', $postcode);

        $this->resolveIfValid();
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
        $this->valid = true;
        return true;
    }

    private function resolve()
    {
        $this->response = Http::get("{$this->endpoint}/{$this->postcode}")->json();

        return $this;
    }

    public static function make(string $postcode)
    {
        return new static($postcode);
    }

    public function isValid(): bool
    {
        return Arr::get($this->response, 'status') === 'match';
    }

    public function getLatLong(): array
    {
        return [
            'lat' => Arr::get($this->response, 'data.latitude'),
            'lng' => Arr::get($this->response, 'data.longitude'),
        ];
    }
}
