<?php

namespace Unit;

use Ae3\LaravelGeoLayer\app\Services\GeocodingService;
use Ae3\LaravelGeoLayer\Tests\TestCase;
use Mockery;

class GeocodingServiceTest extends TestCase
{
    /**
     * @var GeocodingService
     */
    private GeocodingService $geocodingService;

    private $mockedGeocoder;

    /**
     * Set up the test
     */
    public function setUp(): void
    {
        parent::setUp();
        $this->mockedGeocoder = Mockery::mock('overload:Spatie\Geocoder\Geocoder');

        // Configurando o mock para esperar a chamada de setApiKey
        $this->mockedGeocoder->shouldReceive('setApiKey')->once()->withAnyArgs();
        $this->mockedGeocoder->shouldReceive('setRegion')->once()->withAnyArgs();
        $this->mockedGeocoder->shouldReceive('setCountry')->once()->withAnyArgs();
        $this->mockedGeocoder->shouldReceive('setBounds')->once()->withAnyArgs();

        // Configurando o mock para esperar a chamada de getCoordinatesForAddress
        $this->mockedGeocoder->shouldReceive('getCoordinatesForAddress')
            ->once()
            ->with('Brussels, Belgium')
            ->andReturn(['lat' => '50.85045', 'lng' => '4.34878']);

        $this->geocodingService = new GeocodingService();
    }



    /**
     * Test getCoordinatesForAddress function
     */
    public function testGetCoordinatesForAddress(): void
    {
        // Mocking Geocoder response
        $this->mockedGeocoder->shouldReceive('getCoordinatesForAddress')
            ->once()
            ->with('Brussels, Belgium')
            ->andReturn(['lat' => '50.85045', 'lng' => '4.34878']);

        // Testing the function
        $result = $this->geocodingService->getCoordinatesForAddress('Brussels, Belgium');
        $this->assertEquals(['lat' => '50.85045', 'lng' => '4.34878'], $result);
    }

    /**
     * Tear down the test
     */
    public function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }
}