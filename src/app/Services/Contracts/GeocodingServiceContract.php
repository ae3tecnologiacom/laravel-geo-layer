<?php

namespace Ae3\LaravelGeoLayer\app\Services\Contracts;

interface GeocodingServiceContract
{
    /**
     * @param string $address
     * @return array
     */
    public function getCoordinatesForAddress(string $address): array;

    /**
     * @param float $latitude
     * @param float $longitude
     * @return array
     */
    public function getAddressForCoordinates(float $latitude, float $longitude): array;
}