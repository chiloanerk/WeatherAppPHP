<?php

namespace app\classes;

class LocationProcessor extends DataProcessor
{
    public $cityName;
    public $latitude;
    public $longitude;

    public function __construct($cityName, $latitude = null, $longitude = null)
    {
        $this->cityName = $cityName;

        if ($latitude !== null && $longitude !== null) {
            $this->latitude = $latitude;
            $this->longitude = $longitude;
            $this->setNameByCoordinates();
        } else {
            if (!empty($this->cityName)) {
                $this->setCoordinatesByName();
            } else {
                $this->latitude = 0;
                $this->longitude = 0;
            }
        }
    }

    public function setCoordinatesByName()
    {
        $geoUrl = "https://api.openweathermap.org/data/2.5/weather?q=$this->cityName&units=metric&appid=37cae92af4b42d8acfce79455b70c571";
        $context = stream_context_create([
            'http' => [
                'ignore_errors' => true, // Ignore HTTP errors
            ],
        ]);
        $json = file_get_contents($geoUrl, false, $context);

        if ($json === false) {
            $errorData = error_get_last();
            if (strpos($errorData['message'], '404 Not Found') !== false) {
                $this->addMessage('City not found. Please check the city name and try again.');
            } elseif (strpos($errorData['message'], '400 Bad Request') !== false) {
                $this->addMessage('Bad request. Please verify your input and try again.');
            } else {
                $this->addMessage('Unable to connect to the weather service. Please try again later.');
            }
            return;
        }

        $geoData = json_decode($json, true);

        if (isset($geoData['coord']['lat']) && isset($geoData['coord']['lon'])) {
            $this->latitude = $geoData['coord']['lat'];
            $this->longitude = $geoData['coord']['lon'];
        } else {
            $this->addMessage('City not found. Please check the city name and try again.');
        }
    }

    public function getCityName()
    {
        return $this->cityName;
    }

    public function getLatitude()
    {
        return $this->latitude;
    }

    public function getLongitude()
    {
        return $this->longitude;
    }

    public function setNameByCoordinates()
    {
        if (!empty($this->latitude) && !empty($this->longitude)) {
            $reverseGeoUrl = "https://api.openweathermap.org/geo/1.0/reverse?lat=$this->latitude&lon=$this->longitude&limit=1&appid=37cae92af4b42d8acfce79455b70c571";

            $json = file_get_contents($reverseGeoUrl);
            $geoData = json_decode($json);

            if ($geoData !== null && !empty($geoData)) {
                $this->cityName = $geoData[0]->name;
            } else {
                $this->addMessage('Unable to fetch city name from coordinates.');
            }
        } else {
            $this->addMessage('Latitude and longitude coordinates are not set.');
        }
    }
}