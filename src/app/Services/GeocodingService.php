<?php

namespace Ae3\LaravelGeoLayer\app\Services;

use Ae3\LaravelGeoLayer\app\DataTransferObjects\GeocodingResponseData;
use Ae3\LaravelGeoLayer\app\Services\Contracts\GeocodingServiceContract;
use GuzzleHttp\Client;
use Spatie\Geocoder\Geocoder;

class GeocodingService implements GeocodingServiceContract
{
    /**
     * @var Geocoder
     */
    protected Geocoder $geocoder;

    /**
     * Constructs a new instance of the class.
     */
    public function __construct(
        protected readonly Client $client
    )
    {
        $this->geocoder = new Geocoder($client);
        $this->geocoder->setApiKey(config('laravel-geo-layer.key'));
        $this->geocoder->setRegion(config('laravel-geo-layer.region'));
        $this->geocoder->setCountry(config('laravel-geo-layer.country'));
        $this->geocoder->setBounds(config('laravel-geo-layer.bounds'));
    }

    /**
     * Retrieves the coordinates for the given address.
     *
     * @param string $address The address to retrieve coordinates for.
     *
     * @return GeocodingResponseData An array containing the latitude and longitude coordinates.
     */
    public function getCoordinatesForAddress(string $address): GeocodingResponseData
    {
        $response = $this->geocoder->getCoordinatesForAddress($address);

        $viewport = array_key_exists('viewport', $response)
            ? get_object_vars($response['viewport'])
            : [];

        $response['viewport'] = $viewport;

        return GeocodingResponseData::from(
            $response
        );
    }

    /**
     * Retrieves the address for the given coordinates.
     *
     * @param float $latitude The latitude of the coordinates.
     * @param float $longitude The longitude of the coordinates.
     *
     * @return array The address information for the given coordinates.
     */
    public function getAddressForCoordinates(float $latitude, float $longitude): array
    {
        return $this->geocoder->getAddressForCoordinates($latitude, $longitude);
    }
}