<?php

require_once 'WeatherAPI.php';

class UserLocation Extends WeatherAPI
{
    public $cityName;
    public $latitude;
    public $longitude;
    public $apiKey;

    public function __construct($cityName, $latitude = null, $longitude = null) {
        $this->cityName = $cityName;
    
        // Check if latitude and longitude are provided; if not, fetch them based on the city name
        if ($latitude !== null && $longitude !== null) {
            $this->latitude = $latitude;
            $this->longitude = $longitude;
        } else {
            // Check if the city name is not empty
            if (!empty($this->cityName)) {
                // Call method to fetch and set lat and lon based on city name
                $this->setCoordinatesByCityName();
            } else {
                // Handle the case where the city name is empty (e.g., set default coordinates)
                // For example, you can set default coordinates for a specific location.
                $this->latitude = 0; // Set default latitude
                $this->longitude = 0; // Set default longitude
            }
        }
    }
    
    

    public function getCityName() {
        return $this->cityName;
    }

    public function getLatitude() {
        return $this->latitude;
    }

    public function getLongitude() {
        return $this->longitude;
    }

    // New method to fetch city name based on coordinates
    public function setCityNameByCoordinates() {
        if (!empty($this->latitude) && !empty($this->longitude)) {
            // Construct the API URL for reverse geocoding
            $reverseGeocodingUrl = "https://api.openweathermap.org/geo/1.0/reverse?lat=$this->latitude&lon=$this->longitude&limit=1&appid=37cae92af4b42d8acfce79455b70c571";

            // Fetch and parse the reverse geocoding data
            $geoResponse = file_get_contents($reverseGeocodingUrl);
            $geoData = json_decode($geoResponse);
            
            if ($geoData !== null && !empty($geoData)) {
                return $this->cityName = $geoData[0]->name;
            } else {
                throw new Exception("Unable to fetch city name from coordinates.");
            }
        } else {
            throw new Exception("Latitude and longitude coordinates are not set.");
        }
    }

    private function setCoordinatesByCityName() {
        $geocodingUrl = "https://api.openweathermap.org/data/2.5/weather?q=$this->cityName&units=metric&appid=37cae92af4b42d8acfce79455b70c571";
        $geocodingJson = file_get_contents($geocodingUrl);
        $geocodingData = json_decode($geocodingJson, true);

        if (isset($geocodingData['coord']['lat']) && isset($geocodingData['coord']['lon'])) {
            $this->latitude = $geocodingData['coord']['lat'];
            $this->longitude = $geocodingData['coord']['lon'];
        } else {
            throw new Exception("Unable to fetch coordinates for the specified city.");
        }
    }

    
}


