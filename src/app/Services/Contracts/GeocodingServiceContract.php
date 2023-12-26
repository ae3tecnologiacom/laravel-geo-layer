<?php

namespace Ae3\LaravelGeoLayer\app\Services\Contracts;

use Ae3\LaravelGeoLayer\app\DataTransferObjects\GeocodingResponseData;

interface GeocodingServiceContract
{
    /**
     * Retrieves the coordinates for the given address.
     *
     * @param string $address The address to retrieve coordinates for.
     *
     * @return GeocodingResponseData An object containing the latitude and longitude coordinates.
     */
    public function getCoordinatesForAddress(string $address): GeocodingResponseData;

    /**
     * @param float $latitude
     * @param float $longitude
     * @return array
     */
    public function getAddressForCoordinates(float $latitude, float $longitude): array;
}