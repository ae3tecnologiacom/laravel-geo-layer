<?php

return [
    /*
    * The api key used when sending Geocoding requests to Google.
    */
    'key' => env('GOOGLE_MAPS_GEOCODING_API_KEY', ''),

    /*
     * The language param used to set response translations for textual data.
     *
     * More info: https://developers.google.com/maps/faq#languagesupport
     */

    'language' => env('GOOGLE_MAPS_GEOCODING_LANGUAGE', ''),

    /*
     * The region param used to finetune the geocoding process.
     *
     * More info: https://developers.google.com/maps/documentation/geocoding/requests-geocoding#RegionCodes
     */
    'region' => env('GOOGLE_MAPS_GEOCODING_REGION', 'br'),

    /*
     * The bounds param used to finetune the geocoding process.
     *
     * More info: https://developers.google.com/maps/documentation/geocoding/requests-geocoding#Viewports
     */
    'bounds' => env('GOOGLE_MAPS_GEOCODING_BOUNDS', 'Roraima'),

    /*
     * The country param used to limit results to a specific country.
     *
     * More info: https://developers.google.com/maps/documentation/javascript/geocoding#GeocodingRequests
     */
    'country' => env('GOOGLE_MAPS_GEOCODING_COUNTRY', 'Brazil'),
];