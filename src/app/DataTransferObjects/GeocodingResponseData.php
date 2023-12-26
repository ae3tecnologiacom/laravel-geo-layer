<?php

namespace Ae3\LaravelGeoLayer\app\DataTransferObjects;

use Spatie\LaravelData\Data;

class GeocodingResponseData extends Data
{
    /**
     * @param float $lat
     * @param float $lng
     * @param string $accuracy
     * @param string $formatted_address
     * @param array $viewport
     * @param array $address_components
     * @param bool $partial_match
     * @param string $place_id
     * @param array $types
     */
    public function __construct(
        public float $lat,
        public float $lng,
        public string $accuracy,
        public string $formatted_address,
        public array $viewport,
        public array $address_components,
        public bool $partial_match,
        public string $place_id,
        public array $types
    ) {}
}