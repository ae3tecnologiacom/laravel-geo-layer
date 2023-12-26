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
     * Retrieves the address for the given coordinates.
     *
     * @param float $latitude The latitude of the coordinates.
     * @param float $longitude The longitude of the coordinates.
     *
     * @return GeocodingResponseData The address information for the given coordinates.
     */
    public function getAddressForCoordinates(float $latitude, float $longitude): GeocodingResponseData;
}